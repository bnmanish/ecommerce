<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addUser(){
        return view('backend/user/add_user');
    }

    public function listUser(){


        $qry = User::select('id','name','email','user_name','mobile','role','email_verified','mobile_verified','status','created_at')->orderBy('id','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/user/list_user')->with(['data'=>$data,'datacount'=>$dataCount]);


    }

    public function getUserData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = User::count();
        $data = User::select('id','name','email','user_name','mobile','role','email_verified','mobile_verified','status','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('name',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('email',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('user_name',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('mobile',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('role',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('email_verified',$sortdir);
            }else if($sortcol == '7'){
                $data = $data->orderBy('mobile_verified',$sortdir);
            }else if($sortcol == '8'){
                $data = $data->orderBy('created_at',$sortdir);
            }else if($sortcol == '9'){
                $data = $data->orderBy('status',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('name','like',$searchkey.'%')->orWhere('email','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();

        
        $filterdtotal = $searchkey ? count($data) : $total;

        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->name;
            $fdata[$key][] = $dataRow->email;
            $fdata[$key][] = $dataRow->user_name;
            $fdata[$key][] = $dataRow->mobile;
            $fdata[$key][] = $dataRow->role;
            $fdata[$key][] = $dataRow->email_verified == '1' ? 'Yes' : 'No';
            $fdata[$key][] = $dataRow->mobile_verified == '1' ? 'Yes' : 'No';
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = $dataRow->status == '1' ? 'Enable' : 'Disable';
            $fdata[$key][] = "<a href=".route('admin.edit.user',$dataRow->id)." class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>&nbsp;<a href=".route('admin.delete.user',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
            $sl = $sl+1;
        }

        $dataArr = array(
            'draw'  => $draw,
            'recordsTotal'  =>$total,
            'recordsFiltered'  => $filterdtotal,
            'data'  => $fdata,
        );

        return response()->json($dataArr);
    }

    public function stroeUser(Request $request){

        $this->validate($request,[
            'name'  =>  'required|max:255',
            'mobile'  =>  'unique:users,mobile',
            'email'  =>  'required|unique:users,email',
            'user_name'  =>  'required|unique:users,user_name',
            'password'  =>  'required',
            'role'  =>  'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->email_verified = $request->emailverified ? '1':'0';
        $user->mobile_verified = $request->mobileverified ? '1':'0';
        $user->status = $request->status ? '1':'0';
        $user->save();

        

        Session::flash('success','User added successfully.');
        return redirect()->back();
    }

    public function editUser($id){
        $data = User::select('id','name','email','user_name','mobile','role','email_verified','mobile_verified','status' )->where('id',$id)->first();
        return view('backend/user/edit_user')->with(['data'=>$data]);
    }

    public function editStoreUser(Request $request,$id){
        $this->validate($request,[
            'name'  =>  'required|max:255',
            'mobile'  =>  'unique:users,mobile,'.$id,
            'email'  =>  'required|unique:users,email,'.$id,
            'user_name'  =>  'required|unique:users,user_name,'.$id,
            'role'  =>  'required',
        ]);

        if($request->password){
            $data = array(
                "name" => $request->name,
                "mobile" => $request->mobile,
                "email" => $request->email,
                "user_name" => $request->user_name,
                "password" => Hash::make($request->password),
                "role" => $request->role,
                "email_verified" => $request->emailverified ? '1':'0',
                "mobile_verified" => $request->mobileverified ? '1':'0',
                "status" => $request->status ? '1':'0',
            );
        }else{
            $data = array(
                "name" => $request->name,
                "mobile" => $request->mobile,
                "email" => $request->email,
                "user_name" => $request->user_name,
                "role" => $request->role,
                "email_verified" => $request->emailverified ? '1':'0',
                "mobile_verified" => $request->mobileverified ? '1':'0',
                "status" => $request->status ? '1':'0',
            );
        }
        User::where('id',$id)->update($data);

        Session::flash('success','User Updated successfully.');
        return redirect()->back();
    }

    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        Session::flash('success','User Deleted successfully.');
        return redirect()->back();

    }
}
