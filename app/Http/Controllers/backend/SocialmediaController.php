<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SocialMedia;
use Session;

class SocialmediaController extends Controller
{
    
	public function add(){
		return view('backend/socialmedia/add_social_media');
	}

	public function store(Request $request){

		$message = array(
			'link.required'	=>	'Social Media link is required!',
			'link.max'	=>	'Social Media link length must be up to 255 character!',
			'icon.required'	=>	'Social Media icon is required!',
			'status.required'	=>	'Social Media status is required!',
		);

		$this->validate($request,[
			'link'	=>	'required|max:255',
			'icon'	=>	'required',
			'status'	=>	'required',
		],$message);

		$icon = $request->file('icon');
		$iconame = time().'.'.$icon->getClientOriginalExtension();
		$icon->move(base_path('public/uploads/social/'),$iconame);

		$social = new SocialMedia;
		$social->title = $request->title;
		$social->link = $request->link;
		$social->icon = $iconame;
		$social->status = $request->status;
		$social->save();

		Session::flash('success','Social Media Added successfully!');
		return redirect()->route('manage.social.media');

	}

	public function manage(){

		$data = SocialMedia::orderBy('title')->get();
		return view('backend/socialmedia/manage_social_media')->with(['data'=>$data]);

	}

	public function edit($id){
		$data = SocialMedia::where('id',$id)->first();
		return view('backend/socialmedia/edit_social_media')->with(['data'=>$data]);
	}

	public function updateEdit(Request $request,$id){

		$message = array(
			'link.required'	=>	'Social Media link is required!',
			'link.max'	=>	'Social Media link length must be up to 255 character!',
			'status.required'	=>	'Social Media status is required!',
		);

		$this->validate($request,[
			'link'	=>	'required|max:255',
			'status'	=>	'required',
		],$message);

		$icon = $request->file('icon');

		if($icon){
			$oldicon = SocialMedia::find($id);
			
			if(is_file(base_path('public/uploads/social/'.$oldicon->icon))){
				unlink(base_path('public/uploads/social/'.$oldicon->icon));
			}

			$iconame = time().'.'.$icon->getClientOriginalExtension();
			$icon->move(base_path('public/uploads/social/'),$iconame);
			$data = array(
				'title' => $request->title,
				'link' => $request->link,
				'icon' => $iconame,
				'status' => $request->status,
			);
		}else{
			$data = array(
				'title' => $request->title,
				'link' => $request->link,
				'status' => $request->status,
			);
		}
		SocialMedia::where('id',$id)->update($data);
		Session::flash('success','Social Media Updated!');
		return redirect()->route('manage.social.media');
	}

	public function delete($id){
		$oldicon = SocialMedia::find($id);
		if(is_file(base_path('public/uploads/social/'.$oldicon->icon))){
			unlink(base_path('public/uploads/social/'.$oldicon->icon));
		}
		$oldicon->delete();
		Session::flash('success','Social Media Deleted!');
		return redirect()->back();
	}

}
