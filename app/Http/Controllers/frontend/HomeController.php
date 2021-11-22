<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use DB;

class HomeController extends Controller
{
    
	public function home(){
		$slider = Slider::orderBy('sequence','asc')->get();
		$randomCat = Category::inRandomOrder()->limit(3)->get();
		
		// $featuredpro = Product::orderBy('sequence','asc')->limit(16)->get();
		$featuredpro = DB::table('products')
					   ->leftjoin('wishlists','products.id','=','wishlists.product_id')
					   ->select('products.id','products.product','products.product_code','products.url','products.cost_price','products.price','products.max_selling_price','products.image','wishlists.product_id','wishlists.user_id')
					   ->orderBy('products.sequence','asc')
					   ->where(['products.status'=>1])
					   ->limit(16)
					   ->get();

		$newarrival = Product::orderBy('sequence','asc')->limit(16)->get();
		$category = Category::orderBy('sequence','asc')->limit(25)->get();
		$page = Page::where('id',1)->first();
		return view('frontend/home')->with(['slider'=>$slider,'randomcat'=>$randomCat,'featuredpro'=>$featuredpro,'newarrival'=>$newarrival,'category'=>$category,'page'=>$page]);
	}


	public function productDetails($url){

		$product = Product::where('url',$url)->first();
		return view('frontend/product/product_details')->with(['product'=>$product]);

	}


}
