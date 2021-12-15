<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use Session;

class TestimonialController extends Controller
{
    public function add(){
        return view('backend/testimonial/add_testimonial');
    }

    public function store(Request $request){

        $title = $request->title;
        $name = $request->name;
        $position = $request->position;
        $description = $request->description;

        $test = new Testimonial;
        $test->title = $title;
        $test->name = $name;
        $test->position = $position;
        $test->description = $description;
        $test->save();

        Session::flash('success','Added successfully!');
        return redirect()->route('manage.testimonial');

    }

    public function manage(){
        $testimonial = Testimonial::orderBy('id','desc')->get();
        return view('backend/testimonial/manage_testimonial')->with(['testimonial'=>$testimonial]);
    }

    public function delete($id){
        Testimonial::where('id',$id)->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->back();
    }
}
