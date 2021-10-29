<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use DB;

class ShopController extends Controller
{
    public function shop(){
        $page = Page::where('id',4)->first();
        return view('frontend/shop')->with(['page'=>$page]);
    }
}
