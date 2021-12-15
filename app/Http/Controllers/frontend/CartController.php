<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

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
}
