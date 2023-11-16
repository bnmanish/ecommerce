<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AboutController extends Controller
{
    public function aboutUs(){
        $page = Page::where('id',2)->first();
        return view('frontend/about')->with(['page'=>$page]);
    }
}
