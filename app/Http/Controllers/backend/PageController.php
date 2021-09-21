<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use Session;

class PageController extends Controller
{

    public function add(){
        return view('backend/page/add_page');
    }


    public function store(Request $request){

        $this->validate($request,[
            'title' =>  'required',
        ]);

        $banner = $request->file('banner');

        $page = new Page;
        $page->title = $request->title;
        $page->meta_title = $request->meta_title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->short_content = $request->short_content;
        $page->content = $request->content;
        if($banner){
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(base_path('public/uploads/banner/'),$banner_name);
            $page->banner = $banner_name;
        }

        $page->save();

        Session::flash('success','Page added successfully!');
        return redirect()->route('manage.page');

    }

    public function manage(){
        $page = Page::orderBy('id','desc')->get();
        return view('backend/page/manage_page')->with(['page'=>$page]);

    }

    public function edit($id){
        $page = Page::where('id',$id)->first();
        return view('backend/page/edit_page')->with(['page'=>$page]);

    }

    public function editStore(Request $request,$id){

        $this->validate($request,[
            'title' =>  'required',
        ]);

        $banner = $request->file('banner');
        if($banner){

            $old = Page::find($id);
            if(is_file(base_path('public/uploads/banner/'.$old->banner))){
                unlink(base_path('public/uploads/banner/'.$old->banner));
            }

            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $banner->move(base_path('public/uploads/banner/'),$banner_name);
            
            $data = array(
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'short_content' => $request->short_content,
                'content' => $request->content,
                'banner' => $banner_name,
            );
        }else{
            $data = array(
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'short_content' => $request->short_content,
                'content' => $request->content,
            );
        }

        Page::where('id',$id)->update($data);

        Session::flash('success','Page updated successfully!');
        return redirect()->route('manage.page');

    }

    public function delete($id){

        $old = Page::find($id);
        if(is_file(base_path('public/uploads/banner/'.$old->banner))){
            unlink(base_path('public/uploads/banner/'.$old->banner));
        }
        $old->delete();

        Session::flash('success','Page deleted successfully!');
        return redirect()->back();

    }

}
