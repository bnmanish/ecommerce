<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Session;

class ProductController extends Controller
{
    public function addProduct(){
        $category = Category::select('id','title')->orderBy('title')->get();
        return view('backend/product/add_product')->with(['category'=>$category]);
    }

    public function listProduct(){
        $qry = Product::select('id','title','code','price','discount_price','status','created_at')->orderBy('title');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/product/list_product')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function storeProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:products,title',
            'code' => 'required|max:255|unique:products,code',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'meta_title' => 'max:255',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        try {
            DB::beginTransaction();
            $product = new Product();
            $product->title = $request->title;
            // $product->slug = generateSlug($request->title);
            $product->slug = $request->slug;
            $product->code = $request->code;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->meta_title = $request->meta_title;
            $product->meta_keywords = $request->meta_keywords;
            $product->meta_description = $request->meta_description;
            $product->short_description = $request->short_description;
            $product->description = $request->description;
            $product->other_description = $request->other_description;
            $product->popular = $request->popular == 'on' ? '1' : '0';
            $product->new = $request->new == 'on' ? '1' : '0';
            $product->featured = $request->featured == "on" ? '1' : '0';
            $product->sale = $request->sale == "on" ? '1' : '0';
            $product->in_stock = $request->in_stock == "on" ? '1' : '0';
            $product->status = $request->status == "on" ? '1' : '0';
            $product->save();

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $key => $image) {
                    $imgname = time().'_'.$request->code.'_'.$key.'.'.$image->getClientOriginalExtension();
                    $image = $image->move(public_path('uploads/product/'),$imgname);
                    $proimage = new ProductImage;
                    $proimage->product_id = $product->id;
                    $proimage->image = $imgname;
                    $proimage->save();
                }
            }

            DB::commit();
            Session::flash('success','Added successfully!');
            return response()->json(array('status'=>true,'message'=>'product added successfully!'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in transaction: ' . $e->getMessage());
            return response()->json(array('status'=>false,'message'=> $e->getMessage()));

        }
    }

    public function getlistData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Product::count();
        $data = Product::select('id','title','code','price','discount_price','status','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('title',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('code',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('price',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('discount_price',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('status',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('title','like',$searchkey.'%')->orWhere('code','like',$searchkey.'%')->orWhere('price','like',$searchkey.'%')->orWhere('discount_price','like',$searchkey.'%')->orWhere('status','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();
        $filterdtotal = $searchkey ? count($data) : $total;
        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->title;
            $fdata[$key][] = $dataRow->code;
            $fdata[$key][] = $dataRow->price;
            $fdata[$key][] = $dataRow->discount_price;
            $fdata[$key][] = $dataRow->status == '1' ? 'Enable' : 'Disable';
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a href=".route('admin.edit.product',$dataRow->id)." class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>&nbsp;<a href=".route('admin.delete.product',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
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

    public function editProduct($id){
        $category = Category::select('id','title')->orderBy('title')->get();
        $data = Product::find($id);
        return view('backend/product/edit_product')->with(['data'=>$data,'category'=>$category]);
    }

    public function editStoreProduct(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:products,title,'.$id,
            'code' => 'required|max:255|unique:products,code,'.$id,
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'meta_title' => 'max:255',
            // 'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        try {
            DB::beginTransaction();
            $data = array(
                "title" => $request->title,
                // "slug" => generateSlug($request->title),
                "slug" => $request->slug,
                "code" => $request->code,
                "category" => $request->category,
                "price" => $request->price,
                "discount_price" => $request->discount_price,
                "meta_title" => $request->meta_title,
                "meta_keywords" => $request->meta_keywords,
                "meta_description" => $request->meta_description,
                "short_description" => $request->short_description,
                "description" => $request->description,
                "other_description" => $request->other_description,
                "popular" => $request->popular == 'on' ? '1' : '0',
                "new" => $request->new == 'on' ? '1' : '0',
                "featured" => $request->featured == "on" ? '1' : '0',
                "sale" => $request->sale == "on" ? '1' : '0',
                "in_stock" => $request->in_stock == "on" ? '1' : '0',
                "status" => $request->status == "on" ? '1' : '0',
            );
            Product::where('id',$id)->update($data);
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $key => $image) {
                    $imgname = time().'_'.$request->code.'_'.$key.'.'.$image->getClientOriginalExtension();
                    $image = $image->move(public_path('uploads/product/'),$imgname);
                    $proimage = new ProductImage;
                    $proimage->product_id = $id;
                    $proimage->image = $imgname;
                    $proimage->save();
                }
            }
            DB::commit();
            Session::flash('success','Added successfully!');
            return response()->json(array('status'=>true,'message'=>'product updated successfully!'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in transaction: ' . $e->getMessage());
            return response()->json(array('status'=>false,'message'=> $e->getMessage()));

        }

    }

    public function deleteProduct($id){
        $data = ProductImage::where('product_id',$id)->get();
        foreach($data as $image){
            if(is_file(public_path('uploads/product/'.$image->image))){
                unlink(public_path('uploads/product/'.$image->image));
            }
            $image->delete();
        }
        Product::where('id',$id)->delete();
        Session::flash('success','Product Deleted successfully.');
        return redirect()->back();
    }

    public function deleteProductImage(Request $request){
        $imageid = $request->imageId;
        $image = ProductImage::find($imageid);
        $file = public_path('uploads/product/'.$image->image);
        if(is_file($file)){
            unlink($file);
        }
        $image->delete();
        return response()->json(array('status'=>true,'message'=>'Image deleted successfully!'));
    }

}
