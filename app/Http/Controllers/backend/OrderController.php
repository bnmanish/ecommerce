<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function listOrder(){
        $qry = Order::select('id','user_id','order_no','grand_total','mode','status','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/order/list_order')->with(['data'=>$data,'datacount'=>$dataCount]);
    }

    public function getlistOrder(Request $request){
        $sort = $request->order;

        $sortcol = $sort[0]['column'];
        $sortdir = $sort[0]['dir'];

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $searchkey = $request->search['value'];
        $total = Order::count();
        $data = Order::select('orders.id','user_id','order_no','grand_total','mode','orders.status','orders.created_at');
        $data = $data = $data->join('users', 'orders.user_id', '=', 'users.id');

        if($sort){
            if($sortcol == '1'){
                $data = $data->orderBy('orders.order_no',$sortdir);
            }else if($sortcol == '2'){
                $data = $data->orderBy('users.name',$sortdir);
            }else if($sortcol == '3'){
                $data = $data->orderBy('orders.grand_total',$sortdir);
            }else if($sortcol == '4'){
                $data = $data->orderBy('orders.mode',$sortdir);
            }else if($sortcol == '5'){
                $data = $data->orderBy('orders.status',$sortdir);
            }else if($sortcol == '6'){
                $data = $data->orderBy('orders.created_at',$sortdir);
            }
        }
        if($searchkey){
            $data = $data->orWhere('orders.order_no','like',$searchkey.'%')->orWhere('users.name','like',$searchkey.'%')->orWhere('orders.mode','like',$searchkey.'%')->orWhere('orders.grand_total','like',$searchkey.'%')->orWhere('orders.   created_at','like',$searchkey.'%')->orWhere('status','like',$searchkey.'%');
        }
        $data = $data->skip($start)->take($length)->get();
        $filterdtotal = $searchkey ? count($data) : $total;
        $fdata = array();
        $sl = $start + 1;
        foreach($data as $key => $dataRow){
            $fdata[$key][] = $sl;
            $fdata[$key][] = '#'.$dataRow->order_no;
            $fdata[$key][] = $dataRow->user->name;
            $fdata[$key][] = $dataRow->grand_total;
            $fdata[$key][] = $dataRow->mode == '2' ? 'PayUMoney' : 'COD';
            $fdata[$key][] = $dataRow->status == '2' ? 'Paid' : 'Unpaid';
            $fdata[$key][] = date('d-m-Y',strtotime($dataRow->created_at));
            $fdata[$key][] = "<a target='_blank' href='".route('admin.order.invoice',$dataRow->order_no)."'><i class='fas fa-file-invoice'></i></a>";
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

    public function orderInvoice($orderNo){
        $order = Order::where(['order_no'=>$orderNo])->first();
        return view('frontend/invoice/order_invoice')->with(['order'=>$order]);
    }

}
