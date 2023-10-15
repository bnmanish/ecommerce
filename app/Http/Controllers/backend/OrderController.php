<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function listOrder(){
        $qry = Order::select('id','order_no','grand_total','mode','status','created_at')->orderBy('created_at','desc');
        $data = $qry->limit(10)->get();
        $dataCount = $qry->count();
        return view('backend/order/list_order')->with(['data'=>$data,'datacount'=>$dataCount]);
    }
}
