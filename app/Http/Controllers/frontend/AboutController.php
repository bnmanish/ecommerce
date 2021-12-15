<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use DB;

class AboutController extends Controller
{
    public function aboutus(){
        $page = Page::where('id',2)->first();
        return view('frontend/about_us')->with(['page'=>$page]);
    }
}
