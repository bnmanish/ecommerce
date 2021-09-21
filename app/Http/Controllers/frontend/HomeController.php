<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;

class HomeController extends Controller
{
    
	public function home(){
		$slider = Slider::orderBy('sequence','asc')->get();
		$randomCat = Category::inRandomOrder()->limit(3)->get();
		$featuredpro = Product::orderBy('sequence','asc')->limit(16)->get();
		$newarrival = Product::orderBy('sequence','asc')->limit(16)->get();
		$category = Category::orderBy('sequence','asc')->limit(25)->get();
		$page = Page::where('id',1)->first();
		return view('frontend/home')->with(['slider'=>$slider,'randomcat'=>$randomCat,'featuredpro'=>$featuredpro,'newarrival'=>$newarrival,'category'=>$category,'page'=>$page]);
	}

}
