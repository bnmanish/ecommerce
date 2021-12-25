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
        if(Session::get('proid')){
            $arr = Session::get('proid');
        }else{
            $arr = array();
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
        $count = count(Session::get('proid'));
        // return Session::get('proid');
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


}
