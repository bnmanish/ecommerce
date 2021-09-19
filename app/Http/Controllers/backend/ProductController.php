<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Session;
use DB;

class ProductController extends Controller
{
    
	public function add(){
		$category = Category::orderBy('category')->select('id','category')->get();
		return view('backend/product/add_product')->with(['category'=>$category]);
	}


	public function getSubcatByCatId(Request $request){

		$cat = $request->catid;
		$data = SubCategory::select('id','sub_category')->where('category_id',$cat)->get();
		return response()->json(array('data'=>$data));

	}

	public function store(Request $request){

		$message = array(
			'product_name.required' => 'Product name is required field!',
			'product_name.max' => 'Product name lenght must be less than 255 charecter!',
			'url.required' => 'Product url is required field!',
			'url.unique' => 'Product url must be unique!',
			'price.required' => 'Price is required field!',
			'price.numeric' => 'Price must be a numeric value!',
			'price.min' => 'Price cant be 0 or less than 0!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'product_name'	=>	'required|max:255',
			'url'	=>	'required|unique:products',
			'price'	=>	'required|numeric|min:1',
			'category'	=>	'required',
			'subcategory'	=>	'required',
			'status'	=>	'required',
		],$message);

		$img = $request->file('image');

		$pro = new Product;
		$pro->product = $request->product_name;
		$pro->url = $request->url;
		$pro->price = $request->price;
		$pro->category = $request->category;
		$pro->subcat = $request->subcategory;
		$pro->meta_title = $request->meta_title;
		$pro->meta_keywords = $request->meta_keywords;
		$pro->meta_description = $request->meta_description;
		$pro->description = $request->description;
		if($img){
			$imgname = time().'.'.$img->getClientOriginalExtension();
			$img->move(base_path('public/uploads/product/'),$imgname);
			$pro->image = $imgname;
		}
		$pro->status = $request->status;
		$pro->save();

		Session::flash('success','Product added successfully!');
		return redirect()->route('manage.product');

	}

	public function manage(){
		$product = DB::table('products')
					->join('categories','products.category','=','categories.id')
					->join('sub_categories','products.subcat','=','sub_categories.id')
					->select('products.id','products.product','categories.category','sub_categories.sub_category','products.image','products.sequence','products.status','products.price')
					->orderBy('products.product')
					->get();
		return view('backend/product/manage_product')->with(['product'=>$product]);
	}

	public function edit($id){

		$category = Category::orderBy('category')->select('id','category')->get();
		$product = Product::where('id',$id)->first();
		$subcat = SubCategory::orderBy('sub_category')->where('category_id',$product->category)->get();


		return view('backend/product/edit_product')->with(['category'=>$category,'product'=>$product,'subcat'=>$subcat]);

	}

	public function storeEdit(Request $request,$id){

		$message = array(
			'product_name.required' => 'Product name is required field!',
			'product_name.max' => 'Product name lenght must be less than 255 charecter!',
			'url.required' => 'Product url is required field!',
			'url.unique' => 'Product url must be unique!',
			'price.required' => 'Price is required field!',
			'price.numeric' => 'Price must be a numeric value!',
			'price.min' => 'Price cant be 0 or less than 0!',
			'status.required' => 'Status is required!',
		);

		$this->validate($request,[
			'product_name'	=>	'required|max:255',
			'url'	=>	'required|unique:products,url,'.$id,
			'price'	=>	'required|numeric|min:1',
			'category'	=>	'required',
			'subcategory'	=>	'required',
			'status'	=>	'required',
		],$message);

		$img = $request->file('image');
		if($img){

			$oldimg = Product::find($id);
			if(is_file(base_path('public/uploads/product/'.$oldimg->image))){
				unlink(base_path('public/uploads/product/'.$oldimg->image));
			}
			$imgname = time().'.'.$img->getClientOriginalExtension();
			$img->move(base_path('public/uploads/product/'),$imgname);

			$data = array(
				'product' => $request->product_name,
				'url' => $request->url,
				'price' => $request->price,
				'category' => $request->category,
				'subcat' => $request->subcategory,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'image' => $imgname,
				'status' => $request->status,
			);

		}else{
			$data = array(
				'product' => $request->product_name,
				'url' => $request->url,
				'price' => $request->price,
				'category' => $request->category,
				'subcat' => $request->subcategory,
				'meta_title' => $request->meta_title,
				'meta_keywords' => $request->meta_keywords,
				'meta_description' => $request->meta_description,
				'description' => $request->description,
				'status' => $request->status,
			);
		}

		Product::where('id',$id)->update($data);
		Session::flash('success','Updated successfully!');
		return redirect()->route('manage.product');

	}

	public function delete($id){

		$oldimg = Product::find($id);
		if(is_file(base_path('public/uploads/product/'.$oldimg->image))){
			unlink(base_path('public/uploads/product/'.$oldimg->image));
		}
		$oldimg->delete();
		Session::flash('success','Deleted successfully!');
		return redirect()->back();

	}

	public function sequence(Request $request){

		$seq = $request->seq;
		$id = $request->id;

		DB::table('products')->where('id',$id)->update(['sequence'=>$seq]);

		return response()->json(array('status'=>true,'message'=>'Sequence updated successfully!'));

	}

}
