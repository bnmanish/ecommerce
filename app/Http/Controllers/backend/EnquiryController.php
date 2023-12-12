<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactEnquiry;
use Session;

class EnquiryController extends Controller
{
    public function listSubscriber(){
        $qry = ContactEnquiry::select('id','name','mobile','email','city','message','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/enquiry/list_enquiry')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getSubscriberData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = ContactEnquiry::count();
        $data = ContactEnquiry::select('id','name','mobile','email','city','message','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('name',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('mobile',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('email',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('city',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('message',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('name','like',$searchkey.'%')
                    ->orWhere('mobile','like',$searchkey.'%')
                    ->orWhere('email','like',$searchkey.'%')
                    ->orWhere('city','like',$searchkey.'%')
                    ->orWhere('message','like',$searchkey.'%')
                    ->orWhere('created_at','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();

        
        $filterdtotal = $searchkey ? count($data) : $total;

        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->name;
            $fdata[$key][] = $dataRow->mobile;
            $fdata[$key][] = $dataRow->email;
            $fdata[$key][] = $dataRow->city;
            $fdata[$key][] = $dataRow->message;
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a href=".route('admin.delete.enquiry',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
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

    public function deleteSubscriber($id){
        $data = ContactEnquiry::find($id);
        $data->delete();
        Session::flash('success','Subscriber Deleted successfully.');
        return redirect()->back();

    }
}
