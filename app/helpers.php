<?php

use App\Models\Coin;

function coinIcon(){
	$logo = Coin::select('logo')->first()->logo;
	return url('uploads/coin/'.$logo);
}