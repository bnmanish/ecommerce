<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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


}
