<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Cart;
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

    public function verifyOtp(){
        $page = Page::where('id',8)->first();
        return view('frontend/verify_otp')->with(['page'=>$page]);
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
        // $term = $request->term;
        $emailotp = rand(1000,9999);

        $data = array(
            'name'  =>  $name,
            'email'  =>  $email,
            'password'  =>  $password,
            'mobile'  =>  $mobile,
            'emailotp'  =>  $emailotp,
        );

        Session::forget('urdata');
        Session::push('urdata',$data);

        sendOtpOnMail($email,$name,$emailotp);

        return redirect()->route('verifyotp')->with(['email'=>$email,'mobile'=>$mobile]);

    }


    public function matchOtp(Request $request){

        $name = Session::get('urdata')[0]['name'];
        $email = Session::get('urdata')[0]['email'];
        $password = Session::get('urdata')[0]['password'];
        $mobile = Session::get('urdata')[0]['mobile'];
        $emailotp = Session::get('urdata')[0]['emailotp'];

        $message = array(
            'emailotp.required' =>  'Please enter otp!',
        );

        $this->validate($request,[
            'emailotp'  =>  'required',
        ],$message);

        if($emailotp != $request->emailotp){
            return redirect()->back()->with(['message'=>'Please enter correct OTP sent to your email!']);
        }

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->contact = $mobile;
        $user->password = Hash::make($password);
        $user->user_type = 'user';
        $user->is_email_verified = 1;
        $user->status = 1;
        $user->save();

        Session::forget('urdata');

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

            if(Session::get('proid')){
                $arr = Session::get('proid');
                for($i=0; $i < count($arr); $i++){
                    $c = new Cart;
                    $c->user_id = Auth::user()->id;
                    $c->product_id = $arr[$i];
                    $c->quantity = 1;
                    $c->save();
                }
                Session::forget('proid');
            }


            return redirect()->route('home');
        }else{
            Session::flash('error','Either email or password is not correct!');
            return redirect()->back();
        }

    }



}
