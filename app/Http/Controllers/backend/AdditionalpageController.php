<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalPage;
use Session;

class AdditionalpageController extends Controller
{
    
    public function add(){
        return view('backend/additionalpage/add_page');
    }

    public function store(Request $request){
        // return $request->all();
        $message = array(
            'page_title.required'   =>  'Title is required!',
            'url.required'  =>  'URL is required!',
            'position.required' =>  'Please Choose Position of the page!',
        );

        $this->validate($request,[
            'page_title'    =>  'required',
            'url'   =>  'required',
            // 'position'   =>  'required',
        ],$message);

        $banner = $request->file('banner');

        $page = new AdditionalPage;
        $page->page_title = $request->page_title;
        $page->url = $request->url;
        $page->meta_title = $request->meta_title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->page_content = $request->page_content;
        $page->position = $request->position;
        $page->status = $request->status;
        if($banner){
            $banner_name = time().'.'.$banner->getClientOriginalExtension();
            $page->banner = $banner_name;
            $banner->move(base_path('public/uploads/page'),$banner_name);
        }
        $page->save();
        Session::flash('success','Added Successfully!');
        return redirect()->route('manage.additional.page');

    }

    public function manage(){
        $page = AdditionalPage::orderBy('id','desc')->get();
        return view('backend/additionalpage/manage_page')->with(['page'=>$page]);
    }

    public function edit($id){
        $page = AdditionalPage::where('id',$id)->first();
        return view('backend/additionalpage/edit_page')->with(['page'=>$page]);
    }

    public function editStore(Request $request,$id){

        $message = array(
            'page_title.required'   =>  'Title is required!',
            'url.required'  =>  'URL is required!',
            'position.required' =>  'Please Choose Position of the page!',
        );

        $this->validate($request,[
            'page_title'    =>  'required',
            'url'   =>  'required',
            // 'position'   =>  'required',
        ],$message);

        $banner = $request->file('banner');
        if($banner){
            $old = AdditionalPage::find($id);
            if(is_file(base_path('public/uploads/page/'.$old->banner))){
                unlink(base_path('public/uploads/page/'.$old->banner));
            }
            $bannername = time().'.'.$banner->getClientOriginalExtension();
            $data = array(
                'page_title' => $request->page_title,
                'url' => $request->url,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'page_content' => $request->page_content,
                'position' => $request->position,
                'status' => $request->status,
                'banner' => $bannername,
            );
            $banner->move(base_path('public/uploads/page'),$bannername);
        }else{
            $data = array(
                'page_title' => $request->page_title,
                'url' => $request->url,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'page_content' => $request->page_content,
                'position' => $request->position,
                'status' => $request->status,
            );
        }
        AdditionalPage::where('id',$id)->update($data);
        Session::flash('success','updated Successfully!');
        return redirect()->route('manage.additional.page');

    }

    public function delete($id){
        $old = AdditionalPage::find($id);
        if(is_file(base_path('public/uploads/page/'.$old->banner))){
            unlink(base_path('public/uploads/page/'.$old->banner));
        }
        $old->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('manage.additional.page');
    }



}
