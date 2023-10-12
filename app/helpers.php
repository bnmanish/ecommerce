<?php

use App\Models\Coin;
use App\Models\Cart;
use Auth;

function coinIcon(){
	$logo = Coin::select('logo')->first()->logo;
	return url('uploads/coin/'.$logo);
}

function generateSlug($string)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    return $slug;
}


function cartCount()
{
	$count = 0;
	if(Auth::user()){
		$cart = Cart::where('user_id',Auth::user()->id)->first();
		if($cart){
			$count =  $cart->details->count();
		}
	}
    return $count;
}