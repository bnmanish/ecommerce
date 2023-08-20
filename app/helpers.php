<?php

use App\Models\Coin;

function coinIcon(){
	$logo = Coin::select('logo')->first()->logo;
	return url('uploads/coin/'.$logo);
}

function generateSlug($string)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    return $slug;
}