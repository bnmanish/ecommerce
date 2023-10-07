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
use Session;
use Auth;


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
        return view('frontend/my_account');
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

    public function checkout(){
        return view('frontend/checkout');
    }

}
