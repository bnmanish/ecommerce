<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Session;

class CategoryController extends Controller
{

    public function add(){
		return view('backend/category/add_category');
	}

	public function store(Request $request){

		$message = array(
			'category.required' => 'Category is required field!',
			'category.max' => 'Category lenght must be less than 255 charecter!',
			'url.required' => 'Category url is required field!',
			'url.unique' => 'Category url must be unique!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'category'	=>	'required|max:255',
			'url'	=>	'required|unique:categories',
			'status'	=>	'required',
		],$message);


		$image = $request->file('image');

		$cat = new Category;
		$cat->category = $request->category;
		$cat->url = $request->url;
		$cat->meta_title = $request->meta_title;
		$cat->meta_keywords = $request->meta_keywords;
		$cat->meta_description = $request->meta_description;
		$cat->description = $request->description;
		$cat->status = $request->status;
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();
			$cat->image = $img;
			$image->move(base_path('public/uploads/category'),$img);
		}
		$cat->save();
		Session::flash('success','Category Added');
		return redirect()->route('manage.category');

	}

	public function manage(){
		$cat = Category::orderBy('id','desc')->get();
		return view('backend/category/manage_category')->with(['cat'=>$cat]);
	}

	public function edit($id){
		$cat = Category::where('id',$id)->first();
		return view('backend/category/edit_category')->with(['cat'=>$cat]);
	}

	public function storeEdit(Request $request,$id){
		$message = array(
			'category.required' => 'Category is required field!',
			'category.max' => 'Category lenght must be less than 256 charecter!',
			'url.required' => 'Category url is required field!',
			'url.unique' => 'Category url must be unique!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'category'	=>	'required|max:255',
			'url'	=>	'required|unique:categories,url,'.$id,
			'status'	=>	'required',
		],$message);

		$image = $request->file('image');
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();

			$oldimg = Category::find($id);
			if(is_file(base_path('public/uploads/category/'.$oldimg->image))){
				unlink(base_path('public/uploads/category/'.$oldimg->image));
			}

			$data = array(
				'category' => $request->category,
				'url' => $request->url,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'status' => $request->status,
				'image' => $img,
			);
			$image->move(base_path('public/uploads/category'),$img);
		}else{
			$data = array(
				'category' => $request->category,
				'url' => $request->url,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'status' => $request->status,
			);
		}
		Category::where('id',$id)->update($data);
		Session::flash('success','Category Updated');
		return redirect()->route('manage.category');

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

	public function sequence(Request $request){
		$id = $request->id;
		$seq = $request->seq;
		Category::where('id',$id)->update(['sequence'=>$seq]);
		return response()->json(array('status'=>true,'message'=>'Category sequence updated!'));
	}


}
