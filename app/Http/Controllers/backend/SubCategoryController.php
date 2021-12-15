<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Session;

class SubCategoryController extends Controller
{
    
	public function add(){
		$category = Category::orderBy('category')->select('id','category')->get();
		return view('backend/subcategory/add_sub_category')->with(['category'=>$category]);
	}

	public function store(Request $request){

		$message = array(
			'subcategory.required' => 'Sub Category is required field!',
			'subcategory.max' => 'Sub Category lenght must be less than 256 charecter!',
			'url.required' => 'Sub Category url is required field!',
			'url.unique' => 'Sub Category url must be unique!',
			'category.required' => 'Category is required field!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'subcategory'	=>	'required|max:255',
			'url'	=>	'required|unique:sub_categories',
			'category'	=>	'required',
			'status'	=>	'required',
		],$message);

		$image = $request->file('image');

		$cat = new SubCategory;
		$cat->sub_category = $request->subcategory;
		$cat->url = $request->url;
		$cat->category_id = $request->category;
		$cat->meta_title = $request->meta_title;
		$cat->meta_keywords = $request->meta_keywords;
		$cat->meta_description = $request->meta_description;
		$cat->description = $request->description;
		$cat->status = $request->status;
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();
			$cat->image = $img;
			$image->move(base_path('public/uploads/subcategory'),$img);
		}
		$cat->save();
		Session::flash('success','Sub Category Added');
		return redirect()->route('manage.sub.category');

	}

	public function manage(){
		$subcat = SubCategory::orderBy('id','desc')->get();
		return view('backend/subcategory/manage_sub_category')->with(['subcat'=>$subcat]);
	}

	public function edit($id){
		$subcat = SubCategory::where('id',$id)->first();
		$category = Category::orderBy('category')->select('id','category')->get();
		return view('backend/subcategory/edit_sub_category')->with(['subcat'=>$subcat,'category'=>$category]);
	}

	public function storeEdit(Request $request,$id){

		// return $request->all();

		$message = array(
			'subcategory.required' => 'Category is required field!',
			'subcategory.max' => 'Category lenght must be less than 256 charecter!',
			'url.required' => 'Category url is required field!',
			'url.unique' => 'Category url must be unique!',
			'category.required' => 'Category is required field!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'subcategory'	=>	'required|max:255',
			'url'	=>	'required|unique:sub_categories,url,'.$id,
			'category'	=>	'required',
			'status'	=>	'required',
		],$message);

		$image = $request->file('image');
		if($image){
			$img = time().'.'.$image->getClientOriginalExtension();

			$oldimg = SubCategory::find($id);
			if(is_file(base_path('public/uploads/subcategory/'.$oldimg->image))){
				unlink(base_path('public/uploads/subcategory/'.$oldimg->image));
			}

			$data = array(
				'sub_category' => $request->subcategory,
				'url' => $request->url,
				'category_id' => $request->category,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'status' => $request->status,
				'image' => $img,
			);
			$image->move(base_path('public/uploads/subcategory'),$img);
		}else{
			$data = array(
				'sub_category' => $request->subcategory,
				'url' => $request->url,
				'category_id' => $request->category,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'status' => $request->status,
			);
		}
		SubCategory::where('id',$id)->update($data);
		Session::flash('success','Sub Category Updated');
		return redirect()->route('manage.sub.category');

	}

	public function delete($id){
		$oldimg = SubCategory::find($id);
		if(is_file(base_path('public/uploads/subcategory/'.$oldimg->image))){
			unlink(base_path('public/uploads/subcategory/'.$oldimg->image));
		}
		$oldimg->delete();
		Session::flash('success','Sub Category Delete');
		return redirect()->back();
	}

	public function sequence(Request $request){
		// return $request->all();
		$id = $request->id;
		$seq = $request->seq;
		SubCategory::where('id',$id)->update(['sequence'=>$seq]);
		return response()->json(array('status'=>true,'message'=>'Category sequence updated!'));
	}



}
