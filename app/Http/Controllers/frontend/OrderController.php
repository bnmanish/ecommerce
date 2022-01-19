<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderAddress;
use App\Models\Cart;
use App\Models\Coupon;
use Session;
use Auth;
use DB;

class OrderController extends Controller
{
    
    public function placeOrder(Request $request){


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
        $order->order_no = 'ORD'.time();
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

        Session::flash('success','Order made successfullly!');
        return redirect()->route('home');
        

    }

}
