<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderAddress;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Page;
use Session;
use Auth;
use DB;

class OrderController extends Controller
{
    
    public function placeOrder(Request $request){

        // return $request->all();

        $userid = Auth::user()->id;
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
        $subtotal = 0;
        $orderno = 'ECOM/ORD/'.time();

        $cart = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->select('carts.id','carts.quantity','products.price','carts.product_id')
        ->where('carts.user_id',$userid)
        ->get();

        foreach($cart as $cartRow){
            $subtotal = $subtotal + ($cartRow->quantity * $cartRow->price);
        }

        $total = $subtotal;
        $discount = 0;
        $coupon_id = NULL;

        if($coupon_code){
            $today = date('Y-m-d H:i:s');
            $coupon = Coupon::select('id','amount','coupon_type')->where(['coupon_code'=>$coupon_code,'status'=>1])->whereDate('start_time','<=',$today)->whereDate('end_time','>=',$today)->first();
            if($coupon){
                $coupon_id = $coupon->id;
                $discountval = $coupon->amount;
                $discount_type = $coupon->coupon_type;

                if($discount_type == 0){
                    $discount = $discountval;
                    $total = $subtotal - $discount;
                }
                if($discount_type == 1){
                    $discount = (($subtotal * $discountval)/100);
                    $total = $subtotal - $discount;
                }

            }else{
                Session::flash('success','Not a valid coupon code!');
                return redirect()->route('cart');
            }
        }

        $order = new Order;
        $order->order_no = $orderno;
        $order->user_id = $userid;
        $order->coupon_id = $coupon_id;
        $order->discount = $discount;
        $order->subtotal = $subtotal;
        $order->total = $total;
        $order->order_date = date('Y-m-d');
        $order->payment_method = $payment_method;
        // $order->payment_date = NULL;
        // $order->payment_thrugh = NULL;
        // $order->payment_refrence_no = NULL;
        $order->payment_status = 'Unpaid';
        $order->order_status = 'Processed';
        $order->save();

        $address = new OrderAddress;
        $address->order_id = $order->id;
        $address->user_id = $userid;
        $address->name = $name;
        $address->email = $email;
        $address->contact = $contact;
        $address->pincode = $pincode;
        $address->area = $area;
        $address->landmark = $landmark;
        $address->state = $state;
        $address->country = $country;
        $address->save();
        

        foreach($cart as $cartRow){
            $ptotal = $cartRow->quantity * $cartRow->price;

            $detail = new OrderDetail;
            $detail->order_id = $order->id;
            $detail->user_id = $userid;
            $detail->product_id = $cartRow->product_id;
            $detail->quantity = $cartRow->quantity;
            $detail->price = $cartRow->price;
            $detail->ptotal = $ptotal;
            $detail->save();

            Cart::where(['user_id'=>$userid,'product_id'=>$cartRow->product_id])->delete();
        }

        if($payment_method == 'PayUmoney'){

            $posted = array(
              'key' =>  env('PAYU_MERCHANT_KEY'),
              'salt' =>  env('PAYU_SALT'),
              'txnid' =>  $orderno,
              'amount'  =>  $total,
              'firstname' =>  $name,
              'email' =>  $email,
              'phone' =>  $contact,
              'productinfo' =>  'product info',
              'surl'  =>  route('payumoney.success'),
              'furl'  =>  route('payumoney.failure'),
              'service_provider'  =>  env('SERVICE_PROVIDER'),
              'address1'  =>  $area,
              'address2'  =>  $landmark,
              'city'  =>  $state,
              'country'  =>  $country,
              'zipcode'  =>  $pincode,
            );

            return view('payumoney/payumoney')->with(['posted'=>$posted]);
        }

        if($payment_method == 'Cash on Delivery'){

            Session::flash('success','Your order has placed!');
            return redirect()->route('home');
        }
        
    }

    public function payuMoneySuccess(Request $request){

        $page = Page::where('id',12)->first();

        $status=$request->status;
        $firstname=$request->firstname;
        $amount=$request->amount;
        $txnid=$request->txnid;
        $posted_hash=$request->hash;
        $key=$request->key;
        $productinfo=$request->productinfo;
        $email=$request->email;
        $salt= env('PAYU_SALT');

        // Salt should be same Post Request 

        If (isset($request->additionalCharges)) {
               $additionalCharges=$request->additionalCharges;
                $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        } else {
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }
        $hash = hash("sha512", $retHashSeq);
        if ($hash != $posted_hash) {
            // echo "Invalid Transaction. Please try again";
            return view('payumoney/payumoney_success')->with(['page'=>$page]);
        } else {
            $date = date('Y-m-d');
            Order::where('order_no',$txnid)->update(['payment_status'=>'Paid','payment_date'=>$date,'payment_thrugh'=>'PayUmoney']);
            return view('payumoney/payumoney_success')->with(['page'=>$page,'status'=>$status,'txnid'=>$txnid,'amount'=>$amount]);
        }

    }

    public function payuMoneyFailure(Request $request){
        $page = Page::where('id',13)->first();

        $status=$request->status;
        $firstname=$request->firstname;
        $amount=$request->amount;
        $txnid=$request->txnid;

        $posted_hash=$request->hash;
        $key=$request->key;
        $productinfo=$request->productinfo;
        $email=$request->email;
        $salt= env('PAYU_SALT');

        // Salt should be same Post Request 

        If (isset($request->additionalCharges)) {
            $additionalCharges=$request->additionalCharges;
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        } else {
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }
        $hash = hash("sha512", $retHashSeq);
        if ($hash != $posted_hash) {
            echo "Invalid Transaction. Please try again";
        } else {
            return view('payumoney/payumoney_failure')->with(['status'=>$status,'txnid'=>$txnid]);
        } 


        

    }



}
