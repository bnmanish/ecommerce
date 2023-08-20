<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Testimonial;
use Session;


class HomeController extends Controller
{
    public function home(){
        $slider = Slider::select('id','title','description','image')->where('status','1')->orderBy('sorting_order','asc')->get();
        $testimonial = Testimonial::select('id','name','profession','description','image','gender')->where('status','1')->get();
        $category = Category::select('id','title','slug','banner')->where('status','1')->get();
        return view('frontend/home')->with(['slider'=>$slider,'testimonial'=>$testimonial,'category'=>$category]);
    }

    public function login(){
        return view('frontend/login');
    }

    public function products(){
        return view('frontend/product');
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
