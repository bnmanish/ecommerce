<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WebisteSetting;
use Session;

class SettingController extends Controller
{
    public function websiteSetting(){
        $setting = WebisteSetting::first();
        return view('backend/setting/website_setting')->with(['setting'=>$setting]);

    }

    public function saveWebsiteSetting(Request $request,$id){

        $img = $request->file('logo');
        $favicon = $request->file('favicon');
        
        $data = array(
            'facebook'      =>  $request->facebook,
            'instagram'     =>  $request->instagram,
            'twitter'       =>  $request->twitter,
            'gplus'         =>  $request->gplus,
            'linkedin'      =>  $request->linkedin,
            'youtube'       =>  $request->youtube,
            'site_title'    =>  $request->site_title,
            'head_content'  =>  $request->head_content,
            'email1'        =>  $request->email1,
            'email2'        =>  $request->email2,
            'contact1'      =>  $request->contact1,
            'contact2'      =>  $request->contact2,
            'address'       =>  $request->address,  
            'footer_text'   =>  $request->footer_text,  
            'copyright'     =>  $request->copyright,    
        );

        if($img){
            $imgname = time().'.'.$img->getClientOriginalExtension();
            $old = WebisteSetting::find($id);
            if(is_file(base_path('public/uploads/logo/'.$old->logo))){
                unlink(base_path('public/uploads/logo/'.$old->logo));
            }
            $logo = array(
                    'logo'  =>  $imgname,
                );
            $data = array_merge($data,$logo);
            $img->move(base_path('public/uploads/logo'),$imgname);
        }

        if($favicon){
            $faviconname = time().'.'.$favicon->getClientOriginalExtension();
            $old = WebisteSetting::find($id);
            if(is_file(base_path('public/uploads/favicon/'.$old->favicon))){
                unlink(base_path('public/uploads/favicon/'.$old->favicon));
            }
            $favArr = array(
                    'favicon'  =>  $faviconname,
                );
            $data = array_merge($data,$favArr);
            $favicon->move(base_path('public/uploads/favicon'),$faviconname);
        }

        WebisteSetting::where('id',$id)->update($data);
        Session::flash('success','Updated Successfully!');
        return redirect()->back();

    }
}
