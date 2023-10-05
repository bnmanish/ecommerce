<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Product;
use Session;


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
        return view('frontend/cart');
    }
    public function checkout(){
        return view('frontend/checkout');
    }

}
