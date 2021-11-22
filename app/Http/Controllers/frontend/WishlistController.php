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
        $product = DB::table('wishlists')
                    ->join('products','wishlists.product_id','=','products.id')
                    ->select('wishlists.id','products.id as product_id','products.product','products.product','products.product_code','products.url','products.cost_price','products.price','products.max_selling_price','products.image')
                    ->where(['products.status'=>1,'wishlists.user_id'=>Auth::user()->id])
                    ->get();
        return view('frontend/auth/wishlist')->with(['page'=>$page,'product'=>$product]);
    }

    public function addWishlist(Request $request){

        if(!Auth::user()){
            return response()->json(array('status'=>false,'message'=>"Login to add product in wishlist!"));
        }

        $productid = $request->id;
        $wishlist = Wishlist::where(['product_id'=>$productid,'user_id'=>Auth::user()->id])->get();
        $count = count($wishlist);
        if($count > 0){
            Wishlist::where(['product_id'=>$productid,'user_id'=>Auth::user()->id])->delete();
            $status = false;
            $message = "Product removed from wishlist!";
        }else{
            $wishlist = new wishlist;
            $wishlist->product_id = $productid;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            $status = true;
            $message = "Product added to wishlist!";
        }
        $count = wishlist::where('user_id',Auth::user()->id)->count();
        return response()->json(array('status'=>$status,'count'=>$count,'message'=>$message));

    }

    public function deleteFromWishlist(Request $request){
        $id = $request->id;
        Wishlist::where(['id'=>$id,'user_id'=>Auth::user()->id])->delete();
        return response()->json(array('status'=>true,'message'=>'Product removed from wishlist!'));

    }

}
