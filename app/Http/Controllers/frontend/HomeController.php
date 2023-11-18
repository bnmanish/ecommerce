<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\BillingAddress;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Mail\ContactEnquiry;
use Session;
use Hash;
use Mail;
use Auth;
use DB;
use App\Models\Page;
use App\Models\AdditionalPage;

use Validator;
use URL;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class HomeController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function home(){
        $page = Page::where('id',1)->first();
        $slider = Slider::select('id','title','description','image')->where('status','1')->orderBy('sorting_order','asc')->get();
        $testimonial = Testimonial::select('id','name','profession','description','image','gender')->where('status','1')->get();
        $category = Category::select('id','title','slug','banner')->where('status','1')->get();
        $popularProduct = Product::where(['status'=>'1','popular'=>'1'])->orderBy('created_at','desc')->limit(15)->get();
        $newProduct = Product::where(['status'=>'1','new'=>'1'])->orderBy('created_at','desc')->limit(15)->get();
        return view('frontend/home')->with(['slider'=>$slider,'testimonial'=>$testimonial,'category'=>$category,'popularProduct'=>$popularProduct,'newProduct'=>$newProduct,'page'=>$page]);
    }

    public function login(){
        $page = Page::where('id',6)->first();
        return view('frontend/login')->with(['page'=>$page]);
    }

    public function signUp(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success','You have successfully registered!');
        return redirect()->back();
        
    }

    public function logedin(Request $request){
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        $remembe = $request->remembe;

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status' => '1'],$remembe)) {
            return redirect()->route('my.account');
        }else{
            Session::flash('success','Wrong Credentials!');
            return redirect()->back();
        }
    }

    public function products(){
        $page = Page::where('id',3)->first();
        $products = Product::where(['status'=>'1','new'=>'1'])->orderBy('created_at','desc')->get();
        return view('frontend/product')->with(['products'=>$products,'page'=>$page]);
    }

    public function productsDetails($slug){
        $product = Product::where(['status'=>'1','slug'=>$slug])->first();
        return view('frontend/product_details')->with(['product'=>$product]);
    }

    public function myAccount(){
        $page = Page::where('id',5)->first();
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->limit(10)->get();
        return view('frontend/my_account')->with(['orders'=>$orders,'page'=>$page]);
    }

    public function wishlist(){
        return view('frontend/wishlist');
    }

    public function cart(){
        $page = Page::where('id',7)->first();
        $cart = Cart::where(['user_id'=>Auth::user()->id])->first();
        return view('frontend/cart')->with(['cart'=>$cart,'page'=>$page]);
    }

    public function addCart(Request $request){
        $this->validate($request,[
            'quantity' => 'required|numeric|min:1',
        ]);
        $proId = $request->product_id;
        $qty = $request->quantity;
        $message = "";
        $cart = Cart::where(['user_id'=>Auth::user()->id]);
        if($cart->count() > 0){
            $cartId = $cart->first()->id;
        }else{
            $addCart = new Cart;
            $addCart->user_id = Auth::user()->id;
            $addCart->save();
            $cartId = $addCart->id;
        }

        $cartDet = CartDetail::where(['cart_id'=>$cartId,'product_id'=>$proId]);
        if($cartDet->count() > 0){
            $cartDet->update(['quantity'=>$qty]);
            $message = "Product updated in cart!";
        }else{
            $addcartDet = new CartDetail; 
            $addcartDet->cart_id =  $cartId;
            $addcartDet->product_id = $proId;
            $addcartDet->quantity = $qty;
            $addcartDet->save();
            $message = "Product added in cart!";
        }
        Session::flash('success',$message);
        return redirect()->route('cart');


    }

    public function clearCart(){
        $cart = Cart::where(['user_id'=>Auth::user()->id]);
        if($cart->first()->id){
            CartDetail::where('cart_id',$cart->first()->id)->delete();
        }
        $cart->delete();

        return response()->json(array('statu'=>true,'message'=>'All product removed from cart!'));

    }

    public function updateCart(Request $request){
        // return $request->all();
        $ids = $request->cart_details_id;
        $qtys = $request->quantities;

        for($i=0; $i<count($ids); $i++){
            CartDetail::where(['id'=>$ids[$i]])->update(['quantity'=>$qtys[$i]]);
        }
        return redirect()->back();
    }

    public function deleteCartProduct(Request $request){
        $cartDet = CartDetail::find($request->cartDetId);
        if($cartDet->count() < 2){
            $cartDet->delete();
            Cart::where('id',$request->cartId)->delete();
        }else{
            $cartDet->delete();
        }
        return redirect()->back();
    }

    public function checkout(){
        $page = Page::where('id',8)->first();
        $cart = Cart::where(['user_id'=>Auth::user()->id])->first();
        return view('frontend/checkout')->with(['cart'=>$cart,'page'=>$page]);
    }

    public function makeOrder(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'pincode' => 'required|max:255',
            'mode' => 'required|in:COD,PayUMoney,paypal',
        ]);

        DB::beginTransaction();
        try{
            
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $subTotal = 0;
            $grandTotal = 0;
            $orderNo = time();
            foreach($cart->details as $key => $ordersItem){
                if($key == 0){
                    // saving orders 
                    $order = new Order;
                    $order->order_no = $orderNo;
                    $order->user_id = Auth::user()->id;
                    $order->coupon_code = $cart->coupon_code;
                    $order->discount = $cart->discount;
                    $order->shipping_charges = $cart->shipping_charges;
                    $order->taxes = $cart->taxes;
                    $order->sub_total = 0.00;
                    $order->grand_total = 0.00;
                    $order->payment_ref_no = NULL;
                    $order->mode = $request->mode === 'paypal' ? '3' : ($request->mode === 'PayUMoney' ? '2' : '1');  // mode comming in request from checkout page
                    $order->status = '1';
                    $order->save();
                }
                
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $ordersItem->product_id;
                $orderDetail->quantity = $ordersItem->quantity;

                // calculate single product price
                $unitPrice = $ordersItem->product->discount_price > 0 ? $ordersItem->product->discount_price : $ordersItem->product->price;
                // calculate total price by no of product
                $totalPrice = $unitPrice * $ordersItem->quantity;
                $subTotal += $totalPrice; // sum of price for product only

                $orderDetail->unit_price = $unitPrice;
                $orderDetail->total_price = $totalPrice;
                $orderDetail->save();        
            }
            // sum of total price including taxes , charges and discounts
            $grandTotal = $subTotal + $cart->shipping_charges + $cart->taxes - $cart->discount;

            Order::where('id',$order->id)->update(['sub_total'=>$subTotal,'grand_total'=>$grandTotal]);

            //saving address details
            $address = new BillingAddress;
            $address->order_id =  $order->id;
            $address->name =  $request->name;
            $address->email =  $request->email;
            $address->address1 =  $request->address1;
            $address->address2 =  $request->address2;
            $address->city =  $request->city;
            $address->state =  $request->state;
            $address->country =  $request->country;
            $address->pincode =  $request->pincode;
            $address->save();

            DB::commit();
            CartDetail::where('cart_id',$cart->id)->delete();
            Cart::where('id',$cart->id)->delete();

            if ($request->mode === 'paypal') {
                $payer = new Payer();
                $payer->setPaymentMethod('paypal');

                $amount = new Amount();
                $amount->setCurrency('USD')
                       ->setTotal($grandTotal);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                            ->setDescription('Enter Your transaction description');

                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(URL::route('paypal.return'))
                             ->setCancelUrl(URL::route('paypal.cancel'));

                $payment = new Payment();
                $payment->setIntent('Sale')
                        ->setPayer($payer)
                        ->setRedirectUrls($redirectUrls)
                        ->setTransactions([$transaction]);

                try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    if (\Config::get('app.debug')) {
                        Session::flash('error', 'Connection timeout');
                        return Redirect::route('my.account');
                    } else {
                        Session::flash('error', 'Some error occurred, sorry for the inconvenience');
                        return Redirect::route('my.account');
                    }
                }

                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirectUrl = $link->getHref();
                        break;
                    }
                }
                $paypalPaymentId = $payment->getId();
                Session::put('paypal_payment_id', $paypalPaymentId);
                Order::where('id',$order->id)->update(['payment_ref_no'=>$paypalPaymentId]);
                if (isset($redirectUrl)) {
                    return Redirect::away($redirectUrl);
                }

                Session::flash('error', 'Unknown error occurred');
                return Redirect::route('my.account');

            }

            Session::flash('success','Thank you for order with Us, Your order No is : #'.$orderNo);
            return redirect()->route('my.account');
        }catch(\Exception $e){
            DB::rollback();
            $error = $e->getMessage();
            Log::error(date('d-m-Y H:i:s ').$error);
            Session::flash('success',$error);
            return redirect()->back()->withInput();
        }
    }

    public function contactEnquiry(Request $request){
        // return $request->all();
        $emailData = array(
            "name" => $request->name,
            "mobile" => $request->mobile,
            "email" => $request->email,
            "city" => $request->city,
            "message" => $request->message,
        );

        Mail::to(env('CONTACT_ENQUIRY_TO_EMAIL'))->send(new ContactEnquiry($emailData));
        Session::flash('success','Thank you so mutch for your interest in us.');
        return redirect()->back();


    }

    public function orderInvoice($orderNo){
        $order = Order::where(['user_id'=>Auth::user()->id,'order_no'=>$orderNo])->first();
        return view('frontend/invoice/order_invoice')->with(['order'=>$order]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function additionalPages($url){
        $page = AdditionalPage::where(['slug'=>$url])->first();
        return view('frontend/additional_page')->with(['page'=>$page]);
    }

    public function paypalReturn(Request $request){
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            Session::flash('error','Payment failed');
            return Redirect::route('my.account');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {   
            $orderData = Order::where('payment_ref_no',$result->id);
            $orderData->update(['status'=>'2']);
            Session::flash('success','Thank you for order with Us, Your order No is #: '.$orderData->first()->order_no);
            return Redirect::route('my.account');
        }

        Session::flash('error','Payment failed !!');
        return Redirect::route('my.account');
    }

    public function paypalCancel(Request $request){
        echo "paypal cancel";
        return $request->all();
    }

}
