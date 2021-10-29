<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Session;
use DB;

class ContactController extends Controller
{
    public function contactus(){
        $page = Page::where('id',3)->first();
        return view('frontend/contact')->with(['page'=>$page]);
    }
}
