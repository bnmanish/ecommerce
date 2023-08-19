<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Session;

class SliderController extends Controller
{
    public function addSlider(){
        return view('backend/slider/add_slider');
    }

    public function stroeSlider(Request $request){
        // return $request->all();

        $this->validate($request,[
            'title' => 'required|max:255',
            'status' => 'required',
            'image' => 'required|image',
        ]);

        $img = $request->file('image');

        $cat = new Slider;
        $cat->title = $request->title;
        $cat->sorting_order = $request->sorting_order;
        $cat->description = $request->desciption;
        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/slider'),$imgname);
            $cat->image = $imgname;
        }
        $cat->status = $request->status;
        $cat->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('admin.list.slider');
    }


    public function listSlider(){
        $data = Slider::select('id','title','sorting_order','description','image','status')->orderBy('id','desc')->get();
        return view('backend/slider/list_slider')->with(['data'=>$data]);
    }

    public function editSlider(Request $request,$id){
        $data = Slider::where('id',$id)->first();
        return view('backend/slider/edit_slider')->with(['data'=>$data]);
    }

    public function editStoreSlider(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|max:255',
            'status' => 'required',
        ]);

        

        $data = array(
            "title" => $request->title,
            "sorting_order" => $request->sorting_order,
            "description" => $request->desciption,
            "status" => $request->status,
        );

        $img = $request->file('image');
        if($img){
            $old = Slider::find($id);
            if(is_file(base_path('public/uploads/slider/'.$old->image))){
                unlink(base_path('public/uploads/slider/'.$old->image));
            }
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $img->move(base_path('public/uploads/slider'),$imgname);
            $arr2 = array(
                "image" => $imgname,
            );
            $data = array_merge($data,$arr2);
        }
        
        Slider::where('id',$id)->update($data);
        Session::flash('success','Updated successfully!');
        return redirect()->route('admin.list.slider');
    }

    public function deleteSlider($id){
        $old = Slider::find($id);
        if(is_file(base_path('public/uploads/slider/'.$old->image))){
            unlink(base_path('public/uploads/slider/'.$old->image));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('admin.list.slider');
    }
}
