<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    
    public function login(){
        return view('backend/login');
    }

    public function logedin(Request $request){
        $this->validate($request,[
            'user_name' =>  'required|max:50',
            'password' =>  'required',
        ]);

        $uname = $request->user_name;
        $password = $request->password;
        if (Auth::attempt(['email' => $uname, 'password' => $password, 'status' => '1'])) {
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }else if(Auth::attempt(['user_name' => $uname, 'password' => $password, 'status' => '1'])){
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error','Wrong Credentials!');
            return redirect()->back();
        }
    }

    public function adminLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
