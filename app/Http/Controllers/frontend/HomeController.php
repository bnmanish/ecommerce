<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Page;
use Session;
use Auth;
use DB;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    
	public function home(){
		// return Session::all();
		$slider = Slider::orderBy('sequence','asc')->get();
		$randomCat = Category::inRandomOrder()->limit(3)->get();
		$featuredpro = Product::orderBy('sequence','asc')->limit(16)->get();
		$newarrival = Product::orderBy('sequence','asc')->limit(16)->get();
		$category = Category::orderBy('sequence','asc')->limit(25)->get();
		$page = Page::where('id',1)->first();
		$wisharr = Wishlist::where('user_id',@Auth::user()->id)->pluck('product_id')->toArray();

		if(Auth::user()){
			$cartArr = Cart::where('user_id',@Auth::user()->id)->pluck('product_id')->toArray();
		}else{
			$cartArr = Session::get('proid') ? : array();
		}
		


		return view('frontend/home')->with(['slider'=>$slider,'randomcat'=>$randomCat,'featuredpro'=>$featuredpro,'newarrival'=>$newarrival,'category'=>$category,'page'=>$page,'wisharr'=>$wisharr,'cartArr'=>$cartArr]);
	}


	public function productDetails($url){

		// return Session::get('proid');

		$product = Product::where('url',$url)->first();
		$wisharr = Wishlist::where('user_id',@Auth::user()->id)->pluck('product_id')->toArray();
		$cartarr = Cart::where('user_id',@Auth::user()->id)->pluck('product_id')->toArray();
		return view('frontend/product/product_details')->with(['product'=>$product,'wisharr'=>$wisharr,'cartarr'=>$cartarr]);

	}

	public function test(){

		    $client = new \GuzzleHttp\Client();
		    
			// $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

			// echo $response->getStatusCode().'<br>'; // 200
			// echo $response->getHeaderLine('content-type').'<br>'; // 'application/json; charset=utf8'
			// echo $response->getBody().'<br>'; // '{"id": 1420053, "name": "guzzle", ...}'

			// echo "End echo statement";

			// Send an asynchronous request.
			$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
			$promise = $client->sendAsync($request)->then(function ($response) {
			    echo 'I completed! ' . $response->getBody();
			});

			// $promise->wait();

	}


}
