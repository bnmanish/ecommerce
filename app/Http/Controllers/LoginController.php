<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use Session;
use Auth;
use Hash;
use DB;


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

    public function signin(){
        $page = Page::where('id',5)->first();
        return view('frontend/auth/signin')->with(['page'=>$page]);
    }

    public function signup(){
        $page = Page::where('id',6)->first();
        return view('frontend/auth/signup')->with(['page'=>$page]);
    }

    public function register(Request $request){

        $message = array(
            'name.required' =>  'Please fill the name!',
            'email.required' =>  'Please fill the email!',
            'email.unique' =>  'This email is already registered!',
            'password.required' =>  'Password is required!',
            'contact.required' =>  'Mobile no is required!',
            'contact.unique' =>  'This mobile is already registered!',
            'contact.digits' =>  'Mobile no must be of 10 digits!',
            'contact.unique' =>  'This mobile is already registered!',
            'term.required' =>  'Please agree with the terms and conditions!',
        );

        $this->validate($request,[
            'name'  =>  'required',
            'email'  =>  'required|unique:users',
            'password'  =>  'required',
            'contact'  =>  'required|digits:10|unique:users',
            'term'  =>  'required',
        ],$message);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $mobile = $request->contact;
        $term = $request->term;

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->contact = $mobile;
        $user->password = Hash::make($password);
        $user->user_type = 'user';
        $user->status = 1;
        $user->save();

        if(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])){
            Session::flash('success','Welcome <b>'.Auth::user()->name.'</b><br>You are registered Successfully');
            return redirect()->route('home');
        }else{
            Session::flash('error','Sonthing wrong please login');
            return redirect()->route('signin');
        }

    }

    public function userlogin(Request $request){

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])){
            Session::flash('success','Welcome <b>'.Auth::user()->name.'</b>');
            return redirect()->route('home');
        }else{
            Session::flash('error','Either email or password is not correct!');
            return redirect()->back();
        }

    }



}
