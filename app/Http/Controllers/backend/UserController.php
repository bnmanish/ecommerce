<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Hash;
use DB;

class UserController extends Controller
{
	public function add(){
		return view('backend/user/add_user');
	}

	public function store(Request $request){
		$name = $request->name;
		$email = $request->email;
		$contact = $request->contact;
		$password = $request->password;
		$type = $request->type;
		$status = $request->status;

		$user = new User;
		$user->name = $name;
		$user->email = $email;
		$user->contact = $contact;
		$user->password = Hash::make($password);
		$user->user_type = $type;
		$user->status = $status;
		$user->save();

		Session::flash('success','User Added Successfully!');
		return redirect()->route('manage.user');


	}

    public function manage(){
    	$user = User::orderby('id','desc')->get();
    	return view('backend/user/manage_user')->with(['user'=>$user]);
    }

    public function edit($id){
    	$user = User::where('id',$id)->first();
    	return view('backend/user/edit_user')->with(['user'=>$user]);
    }

    public function storeEdit(Request $request,$id){
    	$name = $request->name;
		$email = $request->email;
		$contact = $request->contact;
		$password = $request->password;
		$type = $request->type;
		$status = $request->status;

		if($password != ''){

			$data = array(
				'name' => $name,
				'email' => $email,
				'contact' => $contact,
				'password' => Hash::make($password),
				'user_type' => $type,
				'status' => $status,
			);

		}else{

			$data = array(
				'name'=> $name,
				'email' => $email,
				'contact' => $contact,
				'user_type' => $type,
				'status' => $status,
			);

		}

		User::where('id',$id)->update($data);
		Session::flash('success','User Added Successfully!');
		return redirect()->route('manage.user');

    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	Session::flash('success','User Deleted Successfully!');
		return redirect()->back();

    }

}
