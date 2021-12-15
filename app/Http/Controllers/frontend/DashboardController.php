<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Session;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $page = Page::where('id',7)->first();
        return view('frontend/dashboard/dashboard')->with(['page'=>$page]);
    }

    public function logout(){
        Auth::logout();
        Session::flash('success','Thank you!<br>Visit Again, We will wait for you.');
        return redirect()->route('signin');
    }

}
