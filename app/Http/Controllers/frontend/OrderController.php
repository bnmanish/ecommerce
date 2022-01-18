<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderAddress;
use App\Models\Cart;
use App\Models\Coupon;
use Auth;

class OrderController extends Controller
{
    
    public function placeOrder(Request $request){

        $coupon_code = $request->cc;
        $name = $request->name;
        $email = $request->email;
        $contact = $request->contact;
        $pincode = $request->pincode;
        $area = $request->area;
        $landmark = $request->landmark;
        $state = $request->state;
        $country = $request->country;
        $payment_method = $request->payment_method;

        $order = new Order;
        $order->order_no = time();
        $order->user_id = Auth::user()->id;

        $order->coupon_id = Auth::user()->id;
        $order->discount = Auth::user()->id;
        $order->subtotal = Auth::user()->id;
        $order->total = Auth::user()->id;
        
        $order->order_date = date('Y-m-d');
        // $order->payment_date = NULL;
        $order->payment_method = $payment_method;
        // $order->payment_thrugh = NULL;
        // $order->payment_refrence_no = NULL;
        $order->payment_status = 'Unpaid';
        $order->order_status = 'Pending';


    }

}
