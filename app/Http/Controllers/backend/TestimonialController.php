<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimonial;
use Session;


class TestimonialController extends Controller
{
    public function addTestimonial(){
        return view('backend/testimonial/add_testimonial');
    }

    public function listTestimonial(){
        $qry = Testimonial::select('id','name','profession','title','description','image','gender','status','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/testimonial/list_testimonial')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getlistTestimonial(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Testimonial::count();
        $data = Testimonial::select('id','name','profession','title','description','image','gender','status','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('name',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('profession',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('title',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('image',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('gender',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('status',$sortdir);
            }else if($sortcol == '7'){
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
            $fdata[$key][] = $dataRow->name;
            $fdata[$key][] = $dataRow->profession;
            // $fdata[$key][] = $dataRow->title;
            $fdata[$key][] = $dataRow->image ? "<img width='100' src='".url('uploads/testimonial/'.$dataRow->image)."'>" : '';
            $fdata[$key][] = ($dataRow->gender === '1') ? 'Male' : (($dataRow->gender === '2') ? 'Female' : 'Other');
            $fdata[$key][] = $dataRow->status == '1' ? 'Enable' : 'Disable';
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a href=".route('admin.edit.testimonial',$dataRow->id)." class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>&nbsp;<a href=".route('admin.delete.testimonial',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
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

    public function storeTestimonial(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'profession' => 'required|max:255',
            'gender' => 'required|in:0,1,2',
            // 'title' => 'required|max:255',
            'description' => 'required|max:2000',
            'image' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->profession = $request->profession;
        $testimonial->gender = $request->gender;
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $banner = $request->file('image');
        if($banner){
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/testimonial'),$banner_name);
            $testimonial->image = $banner_name;
        }
        $testimonial->status = $request->status == 'on' ? '1' : '0';
        $testimonial->save();
        Session::flash('success','Added successfully!');
        return response()->json(array('status'=>true,'message'=>'testimonial added successfully!'));
    }

    public function editTestimonial($id){
        $data = Testimonial::where('id',$id)->first();
        return view('backend/testimonial/edit_testimonial')->with(['data'=>$data]);
    }

    public function editStoreTestimonial(Request $request,$id){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'profession' => 'required|max:255',
            'gender' => 'required|in:0,1,2',
            // 'title' => 'required|max:255',
            'description' => 'required|max:2000',
            'image' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return response()->json(array('status'=>false,'errors' => $validator->errors()));
        }

        $data = array(
            "name" => $request->name,
            "profession" => $request->profession,
            "gender" => $request->gender,
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status == 'on' ? '1' : '0',
        );

        $banner = $request->file('image');
        if($banner){
            $oldimg = Testimonial::find($id);
            if(is_file(public_path('uploads/testimonial/'.$oldimg->image))){
                unlink(public_path('uploads/testimonial/'.$oldimg->image));
            }
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('uploads/testimonial'),$banner_name);
            $data_img = array('image' => $banner_name);
            $data = array_merge($data,$data_img);
        }
        Testimonial::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return response()->json(array('status'=>true,'message'=>'testimonial updated successfully!'));

    }

    public function deleteTestimonial($id){
        $data = Testimonial::find($id);
        if(is_file(public_path('uploads/testimonial/'.$data->image))){
            unlink(public_path('uploads/testimonial/'.$data->image));
        }
        $data->delete();
        Session::flash('success','Deleted successfully.');
        return redirect()->back();

    }
}
