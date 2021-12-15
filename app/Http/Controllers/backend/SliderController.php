<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Session;
use DB;

class SliderController extends Controller
{
    public function add(){
		return view('backend/slider/add_slider');
	}

	public function store(Request $request){

		$message = array(
			'title.required' => 'Title is required field!',
			'link.max' => 'link lenght must be less than 255 charecter!',
			'text1.max' => 'text1 lenght must be less than 255 charecter!',
			'text2.max' => 'text2 lenght must be less than 255 charecter!',
			'text3.max' => 'text3 lenght must be less than 255 charecter!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'title'	=>	'required|max:255',
			'link'	=>	'max:255',
			'text1'	=>	'max:255',
			'text2'	=>	'max:255',
			'text3'	=>	'max:255',
			'image'	=>	'required',
			'status'	=>	'required',
		],$message);


		$image = $request->file('image');

		$slider = new Slider;
		$slider->title = $request->title;
		$slider->sequence = $request->sequence;
		$slider->link = $request->link;
		$slider->text1 = $request->text1;
		$slider->text2 = $request->text2;
		$slider->text3 = $request->text3;
		$slider->status = $request->status;
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();
			$slider->image = $img;
			$image->move(base_path('public/uploads/slider'),$img);
		}
		$slider->save();
		Session::flash('success','Slider Added');
		return redirect()->route('manage.slider');

	}

	public function manage(){
		$slider = Slider::orderBy('title')->get();
		return view('backend/slider/manage_slider')->with(['slider'=>$slider]);
	}

	public function edit($id){
		$slider = Slider::where('id',$id)->first();
		return view('backend/slider/edit_slider')->with(['slider'=>$slider]);
	}

	public function editStore(Request $request,$id){

		$message = array(
			'title.required' => 'Title is required field!',
			'link.max' => 'link lenght must be less than 255 charecter!',
			'text1.max' => 'text1 lenght must be less than 255 charecter!',
			'text2.max' => 'text2 lenght must be less than 255 charecter!',
			'text3.max' => 'text3 lenght must be less than 255 charecter!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'title'	=>	'required|max:255',
			'link'	=>	'max:255',
			'text1'	=>	'max:255',
			'text2'	=>	'max:255',
			'text3'	=>	'max:255',
			'status'	=>	'required',
		],$message);

		$image = $request->file('image');
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();

			$oldimg = Slider::find($id);
			if(is_file(base_path('public/uploads/slider/'.$oldimg->image))){
				unlink(base_path('public/uploads/slider/'.$oldimg->image));
			}

			$data = array(
				'title' => $request->title,
				'sequence' => $request->sequence,
				'link' => $request->link,
				'text1' => $request->text1,
				'text2' => $request->text2,
				'text3' => $request->text3,
				'status' => $request->status,
				'image' => $img,
			);
			$image->move(base_path('public/uploads/slider'),$img);
		}else{
			$data = array(
				'title' => $request->title,
				'sequence' => $request->sequence,
				'link' => $request->link,
				'text1' => $request->text1,
				'text2' => $request->text2,
				'text3' => $request->text3,
				'status' => $request->status,
			);
		}
		Slider::where('id',$id)->update($data);
		Session::flash('success','Slider Updated');
		return redirect()->route('manage.slider');

	}

	public function delete($id){
		$oldimg = Category::find($id);
		if(is_file(base_path('public/uploads/category/'.$oldimg->image))){
			unlink(base_path('public/uploads/category/'.$oldimg->image));
		}
		$oldimg->delete();
		Session::flash('success','Category Delete');
		return redirect()->back();
	}
}
