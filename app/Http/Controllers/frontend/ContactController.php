<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function contactUs(){
        $page = Page::where('id',4)->first();
        return view('frontend/contact')->with(['page'=>$page]);
    }
}
