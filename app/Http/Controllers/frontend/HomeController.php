<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\BillingAddress;
use App\Models\OrderDetail;
use App\Models\Order;
use Session;
use Auth;
use DB;


class HomeController extends Controller
{
    public function home(){
        $slider = Slider::select('id','title','description','image')->where('status','1')->orderBy('sorting_order','asc')->get();
        $testimonial = Testimonial::select('id','name','profession','description','image','gender')->where('status','1')->get();
        $category = Category::select('id','title','slug','banner')->where('status','1')->get();
        $popularProduct = Product::where(['status'=>'1','popular'=>'1'])->orderBy('created_at','desc')->limit(15)->get();
        $newProduct = Product::where(['status'=>'1','new'=>'1'])->orderBy('created_at','desc')->limit(15)->get();
        return view('frontend/home')->with(['slider'=>$slider,'testimonial'=>$testimonial,'category'=>$category,'popularProduct'=>$popularProduct,'newProduct'=>$newProduct]);
    }

    public function login(){
        return view('frontend/login');
    }

    public function signUp(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success','You have successfully registered!');
        return redirect()->back();
        
    }

    public function logedin(Request $request){
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        $remembe = $request->remembe;

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status' => '1'],$remembe)) {
            return redirect()->route('my.account');
        }else{
            Session::flash('success','Wrong Credentials!');
            return redirect()->back();
        }
    }

    public function products(){
        $products = Product::where(['status'=>'1','new'=>'1'])->orderBy('created_at','desc')->get();
        return view('frontend/product')->with(['products'=>$products]);
    }

    public function productsDetails($slug){
        $product = Product::where(['status'=>'1','slug'=>$slug])->first();
        return view('frontend/product_details')->with(['product'=>$product]);
    }

    public function myAccount(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('frontend/my_account')->with(['orders'=>$orders]);
    }

    public function wishlist(){
        return view('frontend/wishlist');
    }

    public function cart(){
        $cart = Cart::where(['user_id'=>Auth::user()->id])->first();
        return view('frontend/cart')->with(['cart'=>$cart]);
    }

    public function addCart(Request $request){
        $this->validate($request,[
            'quantity' => 'required|numeric|min:1',
        ]);
        $proId = $request->product_id;
        $qty = $request->quantity;
        $message = "";
        $cart = Cart::where(['user_id'=>Auth::user()->id]);
        if($cart->count() > 0){
            $cartId = $cart->first()->id;
        }else{
            $addCart = new Cart;
            $addCart->user_id = Auth::user()->id;
            $addCart->save();
            $cartId = $addCart->id;
        }

        $cartDet = CartDetail::where(['cart_id'=>$cartId,'product_id'=>$proId]);
        if($cartDet->count() > 0){
            $cartDet->update(['quantity'=>$qty]);
            $message = "Product updated in cart!";
        }else{
            $addcartDet = new CartDetail; 
            $addcartDet->cart_id =  $cartId;
            $addcartDet->product_id = $proId;
            $addcartDet->quantity = $qty;
            $addcartDet->save();
            $message = "Product added in cart!";
        }
        Session::flash('success',$message);
        return redirect()->route('cart');


    }

    public function clearCart(){
        $cart = Cart::where(['user_id'=>Auth::user()->id]);
        if($cart->first()->id){
            CartDetail::where('cart_id',$cart->first()->id)->delete();
        }
        $cart->delete();

        return response()->json(array('statu'=>true,'message'=>'All product removed from cart!'));

    }

    public function updateCart(Request $request){
        // return $request->all();
        $ids = $request->cart_details_id;
        $qtys = $request->quantities;

        for($i=0; $i<count($ids); $i++){
            CartDetail::where(['id'=>$ids[$i]])->update(['quantity'=>$qtys[$i]]);
        }
        return redirect()->back();
    }

    public function deleteCartProduct(Request $request){
        $cartDet = CartDetail::find($request->cartDetId);
        if($cartDet->count() < 2){
            $cartDet->delete();
            Cart::where('id',$request->cartId)->delete();
        }else{
            $cartDet->delete();
        }
        return redirect()->back();
    }

    public function checkout(){
        $cart = Cart::where(['user_id'=>Auth::user()->id])->first();
        return view('frontend/checkout')->with(['cart'=>$cart]);
    }

    public function makeOrder(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'pincode' => 'required|max:255',
            'mode' => 'required|in:COD,PayUMoney',
        ]);

        DB::beginTransaction();
        try{
            //saving address details
            $address = new BillingAddress;
            $address->name =  $request->name;
            $address->email =  $request->email;
            $address->address1 =  $request->address1;
            $address->address2 =  $request->address2;
            $address->city =  $request->city;
            $address->state =  $request->state;
            $address->country =  $request->country;
            $address->pincode =  $request->pincode;
            // $address->save();

            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $subTotal = 0;
            $grandTotal = 0;
            $orderNo = time();
            foreach($cart->details as $key => $ordersItem){
                if($key == 0){
                    // saving orders 
                    $order = new Order;
                    $order->order_no = $orderNo;
                    $order->user_id = Auth::user()->id;
                    $order->coupon_code = $cart->coupon_code;
                    $order->discount = $cart->discount;
                    $order->shipping_charges = $cart->shipping_charges;
                    $order->taxes = $cart->taxes;
                    $order->sub_total = 0.00;
                    $order->grand_total = 0.00;
                    $order->payment_ref_no = NULL;
                    $order->mode = $request->mode === 'PayUMoney' ? '2' : '1';  // mode comming in request from checkout page
                    $order->status = '1';
                    $order->save();
                }
                
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $ordersItem->product_id;
                $orderDetail->quantity = $ordersItem->quantity;

                // calculate single product price
                $unitPrice = $ordersItem->product->discount_price > 0 ? $ordersItem->product->discount_price : $ordersItem->product->price;
                // calculate total price by no of product
                $totalPrice = $unitPrice * $ordersItem->quantity;
                $subTotal += $totalPrice; // sum of price for product only

                $orderDetail->unit_price = $unitPrice;
                $orderDetail->total_price = $totalPrice;
                $orderDetail->save();        
            }
            // sum of total price including taxes , charges and discounts
            $grandTotal = $subTotal + $cart->shipping_charges + $cart->taxes - $cart->discount;

            Order::where('id',$order->id)->update(['sub_total'=>$subTotal,'grand_total'=>$grandTotal]);

            
            DB::commit();
            CartDetail::where('cart_id',$cart->id)->delete();
            Cart::where('id',$cart->id)->delete();

            Session::flash('success','Thank you for order with Us, Your order tracking no is : #'.$orderNo);
            return redirect()->route('my.account');
        }catch(\Exception $e){
            DB::rollback();
            Session::flash('success',$e->getMessage());
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
