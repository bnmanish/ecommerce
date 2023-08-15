<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function home(){
        return view('frontend/home');
    }

    public function login(){
        return view('frontend/login');
    }


}
