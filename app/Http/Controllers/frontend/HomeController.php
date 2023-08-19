<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Slider;

class HomeController extends Controller
{
    public function home(){
        $slider = Slider::select('id','title','description','image')->where('status','1')->orderBy('sorting_order','asc')->get();
        return view('frontend/home')->with(['slider'=>$slider]);
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
