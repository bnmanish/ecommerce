<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('backend/category/add_category');
    }

    public function listcategory(){
        $qry = Category::select('id','title','banner','status','created_at')->orderBy('title');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/category/list_category')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getlistData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Category::count();
        $data = Category::select('id','title','banner','status','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('title',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('banner',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('status',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('title','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();
        $filterdtotal = $searchkey ? count($data) : $total;
        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->title;
            $fdata[$key][] = "<img width='100' src='".url('uploads/category/'.$dataRow->banner)."'>";
            $fdata[$key][] = $dataRow->status == '1' ? 'Enable' : 'Disable';
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a href=".route('admin.edit.category',$dataRow->id)." class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>&nbsp;<a href=".route('admin.delete.category',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
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

    public function storeCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:categories,title',
            // 'slug' => 'required|max:255|unique:categories,slug',
            'meta_title' => 'max:255',
            'banner' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }
        $category = new Category();
        $category->title = $request->title;
        // $category->slug = generateSlug($request->title);
        $category->slug = $request->slug;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->short_description = $request->short_description;
        $category->description = $request->description;
        $banner = $request->file('banner');
        if($banner){
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/category'),$banner_name);
            $category->banner = $banner_name;
        }
        $category->status = $request->status == 'on' ? '1' : '0';
        $category->save();
        Session::flash('success','Added successfully!');
        return response()->json(array('status'=>true,'message'=>'category added successfully!'));
    }

    public function editCategory($id){
        $data = Category::where('id',$id)->first();
        return view('backend/category/edit_category')->with(['data'=>$data]);
    }

    public function editStoreCategory(Request $request,$id){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:categories,title,'.$id,
            // 'slug' => 'required|max:255|unique:categories,slug,'.$id,
            'meta_title' => 'max:255',
            'banner' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        $data = array(
            "title" => $request->title,
            // "slug" => generateSlug($request->title),
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "meta_keywords" => $request->meta_keywords,
            "meta_description" => $request->meta_description,
            "short_description" => $request->short_description,
            "description" => $request->description,
            "status" => $request->status == 'on' ? '1' : '0',
        );

        $banner = $request->file('banner');
        if($banner){
            $oldimg = Category::find($id);
            if(is_file(public_path('uploads/category/'.$oldimg->banner))){
                unlink(public_path('uploads/category/'.$oldimg->banner));
            }
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/category'),$banner_name);
            $data_img = array('banner' => $banner_name);
            $data = array_merge($data,$data_img);
        }
        Category::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return response()->json(array('status'=>true,'message'=>'category updated successfully!'));

    }

    public function deleteCategory($id){
        $data = Category::find($id);
        if(is_file(public_path('uploads/category/'.$data->banner))){
            unlink(public_path('uploads/category/'.$data->banner));
        }
        $data->delete();
        Session::flash('success','User Deleted successfully.');
        return redirect()->back();

    }
}
