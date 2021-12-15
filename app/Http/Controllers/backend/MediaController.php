<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Media;
use Session;

class MediaController extends Controller
{
    
	public function add(){
		return view('backend/media/add_media');
	}

	public function store(Request $request){

		$this->validate($request,[
			'image'	=>	'required'
		]);

		$image = $request->file('image');
		$imgname = time().'.'.$image->getClientOriginalExtension();

		$media = new Media;
		$media->title = $request->title;
		$media->description = $request->description;
		$media->image = $imgname;
		$media->save();

		$image->move(base_path('public/uploads/media/'),$imgname);

		Session::flash('success','Media Uploaded successfully!');
		return redirect()->route('manage.media');

	}

	public function manage(){

		$data = Media::orderBy('title')->get();
		return view('backend/media/manage_media')->with(['data'=>$data]);

	}

	public function edit($id){

		$data = Media::where('id',$id)->first();
		return view('backend/media/edit_media')->with(['data'=>$data]);

	}

	public function editStore(Request $request,$id){

		$image = $request->file('image');
		
		if($image){
		
			$oldimg = Media::find($id);
			if(is_file(base_path('public/uploads/media/'.$oldimg->image))){
				unlink(base_path('public/uploads/media/'.$oldimg->image));
			}
		
			$imgname = time().'.'.$image->getClientOriginalExtension();
			$image->move(base_path('public/uploads/media/'),$imgname);
		
			$data = array(
				'title' => $request->title,
				'description' => $request->description,
				'image' => $imgname,
			);
		
		}else{
		
			$data = array(
				'title' => $request->title,
				'description' => $request->description,
			);
		
		}
		
		Media::where('id',$id)->update($data);
		Session::flash('success','Media Updated successfully!');
		return redirect()->route('manage.media');
	}

	public function delete($id){

		$oldimg = Media::find($id);
		if(is_file(base_path('public/uploads/media/'.$oldimg->image))){
			unlink(base_path('public/uploads/media/'.$oldimg->image));
		}
		$oldimg->delete();
		Session::flash('success','Media Deleted successfully!');
		return redirect()->route('manage.media');

	}

}
