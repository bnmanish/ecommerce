<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Session;

class SettingController extends Controller
{
    public function manageSetting(){
        $data = Setting::first();
        return view('backend/setting/setting')->with(['data'=>$data]);
    }

    public function updateSetting(Request $request){
        $id = $request->id;
        $img = $request->file('site_logo');
        $img2 = $request->file('site_logo2');
        $fi = $request->file('favicon');
        if($id){
            $data = array(
                "primary_contact" =>  $request->primary_contact,
                "secondary_contact" =>  $request->secondary_contact,
                "primary_email" =>  $request->primary_email,
                "secondary_email" =>  $request->secondary_email,
                "primary_address" =>  $request->primary_address,
                "secondary_address" =>  $request->secondary_address,
                "copyrights" =>  $request->copyrights,
                "facebook" =>  $request->facebook,
                "instagram" =>  $request->instagram,
                "twitter" =>  $request->twitter,
                "linkedin" =>  $request->linkedin,
                "youtube" =>  $request->youtube,
                "head_content" =>  $request->head_content,
            );
            if($img){
                $old = Setting::find($id);
                if(is_file(base_path('public/uploads/setting/'.$old->site_logo))){
                    unlink(base_path('public/uploads/setting/'.$old->site_logo));
                }
                $sitelogo = time().'_logo.'.$img->getClientOriginalExtension();
                $img->move(base_path('public/uploads/setting'),$sitelogo);
                $data2 = array(
                    'site_logo' =>  $sitelogo,
                );
                $data = array_merge($data,$data2);
            }
            if($fi){
                $old = Setting::find($id);
                if(is_file(base_path('public/uploads/setting/'.$old->favicon))){
                    unlink(base_path('public/uploads/setting/'.$old->favicon));
                }
                $sitelogo = time().'_favicon.'.$fi->getClientOriginalExtension();
                $fi->move(base_path('public/uploads/setting'),$sitelogo);
                $data3 = array(
                    'favicon' =>  $sitelogo,
                );
                $data = array_merge($data,$data3);
            }
            if($img2){
                $old = Setting::find($id);
                if(is_file(base_path('public/uploads/setting/'.$old->site_logo2))){
                    unlink(base_path('public/uploads/setting/'.$old->site_logo2));
                }
                $sitelogo = time().'_logo2.'.$img2->getClientOriginalExtension();
                $img2->move(base_path('public/uploads/setting'),$sitelogo);
                $data4 = array(
                    'site_logo2' =>  $sitelogo,
                );
                $data = array_merge($data,$data4);
            }
            Setting::where('id',$id)->update($data);
            Session::flash('success','Setting Updated!');
        }else{
            $setting = new Setting;
            $setting->primary_contact =  $request->primary_contact;
            $setting->secondary_contact =  $request->secondary_contact;
            $setting->primary_email =  $request->primary_email;
            $setting->secondary_email =  $request->secondary_email;
            $setting->primary_address =  $request->primary_address;
            $setting->secondary_address =  $request->secondary_address;
            $setting->copyrights =  $request->copyrights;
            $setting->facebook =  $request->facebook;
            $setting->instagram =  $request->instagram;
            $setting->twitter =  $request->twitter;
            $setting->linkedin =  $request->linkedin;
            $setting->youtube =  $request->youtube;
            if($img){
                $sitelogo = time().'_logo.'.$img->getClientOriginalExtension();
                $img->move(base_path('public/uploads/setting'),$sitelogo);
                $setting->site_logo =  $sitelogo;
            }
            if($fi){
                $sitelogo = time().'_favicon.'.$fi->getClientOriginalExtension();
                $fi->move(base_path('public/uploads/setting'),$sitelogo);
                $setting->favicon =  $sitelogo;
            }
            $setting->save();
            Session::flash('success','Setting Added!');
        }
        return redirect()->back();
    }
}
