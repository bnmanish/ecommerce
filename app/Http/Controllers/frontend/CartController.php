<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Page;
use App\Models\Cart;
use Session;
use Auth;
use DB;

class CartController extends Controller
{
    public function addCart(Request $request){
        $arr = array();
        if(Auth::user()){
            $arr = Cart::where('user_id',Auth::user()->id)->pluck('product_id')->toArray();
            if(in_array($request->id,$arr)){
                Cart::where(['user_id'=>Auth::user()->id,'product_id'=>$request->id])->delete();
                $status = false;
                $message = "Product removed from cart!";
            }else{
                Cart::create(['user_id'=>Auth::user()->id,'product_id'=>$request->id,'quantity'=>1]);
                $status = true;
                $message = "Product added to cart!";
            }
            $arr = Cart::where('user_id',Auth::user()->id)->pluck('product_id')->toArray();
        }else{
            if(Session::get('proid')){
                $arr = Session::get('proid');
            }
            if(in_array($request->id,$arr)){
                $arrIndex = array_search($request->id, $arr);
                Session::forget('proid.'.$arrIndex);
                $status = false;
                $message = "Product removed from cart!";
            }else{
                Session::push('proid',$request->id);
                $status = true;
                $message = "Product added to cart!";
            }
            $arr = Session::get('proid');

        }
        
        $count = count($arr);
        return response()->json(array('status'=>$status,'count'=>$count,'message'=>$message));
    }

    public function cart(){
        $cartpro = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->join('users','carts.user_id','=','users.id')
        ->select('carts.id','carts.quantity','carts.product_id','products.product','products.product_code','products.url','products.price','products.max_selling_price','products.image')
        ->where('carts.user_id',Auth::user()->id)
        ->get();
        $page = Page::where('id',10)->first();
        return view('frontend/shop/cart')->with(['page'=>$page,'cartpro'=>$cartpro]);
    }

    public function clearCart(){

        Cart::where('user_id',Auth::user()->id)->delete();
        return redirect()->back();

    }

    public function deleteCartProduct(Request $request){
        
        $cart = Cart::where('id',$request->cartid)->delete();
        if($cart){
            $subtotal = 0;
            $c = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.quantity','products.price')
            ->where('carts.user_id',Auth::user()->id)
            ->get();
            foreach($c as $cRow){
                $subtotal = $subtotal + ($cRow->quantity * $cRow->price);
            }

            return response()->json(array('status'=>true,'subtotal'=>number_format($subtotal,2),'message'=>'Product removed from cart!'));
        }else{
            return response()->json(array('status'=>false,'message'=>'Product already removed from cart!'));
        }
    }

    public function updateCartQuantity(Request $request){
        $cartid = $request->cartid;
        $qty = $request->qty;
        $cart = Cart::where('id',$cartid)->update(['quantity'=>$qty]);


        $crow = $c = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('carts.quantity','products.price')
        ->where(['carts.id'=>$cartid])
        ->first();

        $prototal = $crow->quantity * $crow->price;

        $subtotal = 0;
        $c = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('carts.quantity','products.price')
        ->where('carts.user_id',Auth::user()->id)
        ->get();
        foreach($c as $cRow){
            $subtotal = $subtotal + ($cRow->quantity * $cRow->price);
        }

        return response()->json(array('status'=>true,'subtotal'=>number_format($subtotal,2),'prototal'=>number_format($prototal,2),'message'=>'Quantity updated!'));

    }

    public function viewCart(){

        
        if(Auth::user()){
            $cart = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.id','carts.quantity','products.price','products.image','products.product','products.url')
            ->where('carts.user_id',Auth::user()->id)
            ->get();
        }else{
            $cart = array();
            $ses = array_values(Session::get('proid') ? : array());
            for($i=0;$i<count($ses);$i++){
                $cart[] = DB::table('products')
                ->select('products.id','products.price','products.image','products.product','products.url')
                ->addSelect(DB::raw("1 as quantity"))
                ->where('products.id',$ses[$i])
                ->first();
            }
        }

        return view('frontend/shop/minicart')->with(['cart'=>$cart]);

    }

    public function removeProMiniCart(Request $request){
        $cartid = $request->cartid;

        if(Auth::user()){
            $cart = Cart::where('id',$cartid)->delete();
            $count = Cart::where('user_id',Auth::user()->id)->count();
        }else{
            $arr = Session::get('proid');
            $cart = true;
            if(in_array($cartid,$arr)){
                $arrIndex = array_search($cartid, $arr);
                Session::forget('proid.'.$arrIndex);
                $count = count(Session::get('proid'));
            }
        }


        if($cart){
            return response()->json(array('status'=>true,'count'=>$count,'message'=>'Product removed from cart!'));
        }else{
            return response()->json(array('status'=>false,'count'=>$count,'message'=>'Product already removed from cart!'));
        }
        
    }

    public function verifyCouponCode(Request $request){
        $couponcode = $request->couponcode;
        $today = date('Y-m-d H:i:s');

        $coupon = Coupon::select('amount','coupon_type')->where(['coupon_code'=>$couponcode,'status'=>1])->whereDate('start_time','<=',$today)->whereDate('end_time','>=',$today)->first();
        if($coupon){

            $subtotal = 0;
            $c = DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->select('carts.quantity','products.price')
            ->where('carts.user_id',Auth::user()->id)
            ->get();
            foreach($c as $cRow){
                $subtotal = $subtotal + ($cRow->quantity * $cRow->price);
            }
            if($coupon->coupon_type == 0){
                $discount = $coupon->amount;
                $total = $subtotal - $discount;
            }
            if($coupon->coupon_type == 1){
                $discount = (($subtotal * $coupon->amount)/100);
                $total = $subtotal - $discount;
            }

            return response()->json(array('status'=>true,'discount'=>number_format($discount,2),'subtotal'=>number_format($subtotal,2),'total'=>number_format($total,2),'message'=>'Coupon code applied successfully!'));
        }else{
            return response()->json(array('status'=>false,'message'=>'Please enter a valid coupon code!'));
        }
    }

    public function checkout(Request $request){

        $couponcode = $request->couponcode;
        $discountval = false;
        $discount_type = false;

        if($couponcode){
            $today = date('Y-m-d H:i:s');
            $coupon = Coupon::select('amount','coupon_type')->where(['coupon_code'=>$couponcode,'status'=>1])->whereDate('start_time','<=',$today)->whereDate('end_time','>=',$today)->first();
            
            if($coupon){
                $discountval = $coupon->amount;
                $discount_type = $coupon->coupon_type;
            }else{
                Session::flash('success','Not a valid coupon code!');
                return redirect()->back();
            }

        }

        $cartpro = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->join('users','carts.user_id','=','users.id')
        ->select('carts.id','carts.quantity','carts.product_id','products.product','products.product_code','products.url','products.price','products.max_selling_price','products.image')
        ->where('carts.user_id',Auth::user()->id)
        ->get();

        $page = Page::where('id',11)->first();
        return view('frontend/shop/checkout')->with(['page'=>$page,'cartpro'=>$cartpro,'discountval'=>$discountval,'couponcode'=>$couponcode,'discount_type'=>$discount_type]);
    }


}
