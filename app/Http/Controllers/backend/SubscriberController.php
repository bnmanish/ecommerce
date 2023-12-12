<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subscriber;
use Session;

class SubscriberController extends Controller
{
    public function listSubscriber(){
        $qry = Subscriber::select('id','email','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/subscriber/list_subscriber')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getSubscriberData(Request $request){

        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Subscriber::count();
        $data = Subscriber::select('id','email','created_at');
        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('email',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('email','like',$searchkey.'%')->orWhere('created_at','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();

        
        $filterdtotal = $searchkey ? count($data) : $total;

        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = $dataRow->email;
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a href=".route('admin.delete.subscriber',$dataRow->id)." class='btn btn-danger btn-sm' onclick=return confirm('Really! Do you want to delete?')><i class='fas fa-trash'></i></a>";
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
        $data = Subscriber::find($id);
        $data->delete();
        Session::flash('success','Subscriber Deleted successfully.');
        return redirect()->back();

    }

}
