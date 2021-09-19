<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;

class LoginController extends Controller
{
    public function adminLogin(){
    	return view('login');
    }

    public function adminLogedin(Request $request){

    	$message = array(
    		'required.email'	=>	'This is required',
    		'required.password'	=>	'This is required',
    	);
    	$this->validate($request,[
    		'email'	=>	'required',
    		'password'	=>	'required',
    	],$message);

        $email = $request->email;
        $pass = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $pass, 'status' => 1])){
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->route('dashboard');
        }else{
            Session::flash('error','Sorry! Try Again. It seems your login credential is not correct.');
            return redirect()->back();
        }

    }

    public function adminlogout(){
    	Auth::logout();
    	return redirect()->route('adminlogin');
    }



}
