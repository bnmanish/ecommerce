<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Wishlist;
use Session;
use Auth;
use DB;

class WishlistController extends Controller
{
    public function wishlist(){
        $page = Page::where('id',9)->first();
        return view('frontend/auth/wishlist')->with(['page'=>$page]);
    }

    public function addWishlist(Request $request){

        if(!Auth::user()){
            return response()->json(array('status'=>false,'message'=>"Login to add product in wishlist!"));
        }

        $productid = $request->id;
        $wishlist = Wishlist::where(['product_id'=>$productid,'user_id'=>Auth::user()->id])->get();
        if(count($wishlist) > 0){
            Wishlist::where(['product_id'=>$productid,'user_id'=>Auth::user()->id])->delete();
            return response()->json(array('status'=>false,'message'=>"Product removed from wishlist!"));
        }else{

            $wishlist = new wishlist;
            $wishlist->product_id = $productid;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            return response()->json(array('status'=>true,'message'=>"Product added to wishlist!"));

        }

    }

}
