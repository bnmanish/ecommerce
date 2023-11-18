@extends('frontend/layouts/main')
@section('title', $page->meta_title)
@section('keywords', $page->meta_keywords)
@section('description', $page->meta_description)
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">{{$page->title}}</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">{{$page->title}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start checkout page area -->
    <div class="checkout__page--area section--padding">
        <div class="container">
            <form action="{{route('make.order')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-6">

                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-success alert-dismissible mb-2">
                                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                  {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-danger alert-dismissible mb-2">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              {{ Session::get('success') }}
                            </div>
                        @endif


                        <div class="main checkout__mian">
                                <div class="checkout__content--step section__shipping--address pt-0">
                                    <div class="section__header mb-25">
                                        <h2 class="section__header--title h3">Billing Address</h2>
                                    </div>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="name">Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="name" id="name"  type="text" name="name" value="{{old('name')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="email">Email <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="email" id="email" type="email" name="email" value="{{old('email')}}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="address">Address1 <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" id="address" type="text" name="address1" value="{{old('address1')}}">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="address2">Address2 <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address2" id="address2" type="text" name="address2" value="{{old('address2')}}">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="city">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City" id="city" type="text" name="city" value="{{old('city')}}">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="state">State <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="State" id="state" type="text" name="state" value="{{old('state')}}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="country">Country  <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Country " id="country" type="text" name="country" value="{{old('country')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="pincode">Pin Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Pin code" id="pincode" type="text" name="pincode" value="{{old('pincode')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="checkout__content--step__footer d-flex align-items-center">
                                    <a class="continue__shipping--btn primary__btn border-radius-5" href="{{route('products')}}">Continue Shopping</a>
                                    <a class="previous__link--content" href="{{route('cart')}}">Return to cart</a>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        @php
                                            $gtotal = 0;
                                            $subTotal = 0;
                                            $tax = 0;
                                            $shippingCharge = 0;
                                            $couponDiscount = 0;
                                        @endphp
                                        @foreach($cart->details as $cartItem)
                                        @php
                                            $price = 0;
                                            if($cartItem->product->discount_price > 0 ){
                                                $price = $cartItem->product->discount_price;
                                            }else{
                                                $price = $cartItem->product->price;
                                            }

                                            $productTotal = $price * $cartItem->quantity; 
                                            $subTotal += $productTotal;

                                        @endphp
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="{{route('products.details',$cartItem->product->slug)}}"><img class="display-block border-radius-5" src="{{url('uploads/product/'.$cartItem->product->images->first()->image)}}" alt="{{$cartItem->product->title}}"></a>
                                                        <span class="product__thumbnail--quantity">{{$cartItem->quantity}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="{{route('products.details',$cartItem->product->slug)}}">{{$cartItem->product->title}}</a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{currency('dollar')}} {{number_format($productTotal,2)}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">SUB TOTAL </td>
                                            <td class="checkout__total--amount text-right">{{currency('dollar')}} {{number_format($subTotal,2)}}</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">TAX </td>
                                            <td class="checkout__total--amount text-right">{{currency('dollar')}} {{number_format($tax,2)}}</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">SHIPPING CHARGE</td>
                                            <td class="checkout__total--amount text-right">{{currency('dollar')}} {{number_format($shippingCharge,2)}}</td>

                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">COUPON CHARGE </td>
                                            <td class="checkout__total--amount text-right">{{currency('dollar')}} {{number_format($couponDiscount,2)}}</td>
                                        </tr>
                                    </tbody>
                                    @php 
                                        $gtotal = $subTotal + $tax + $shippingCharge - $couponDiscount;
                                    @endphp
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">TOTAL </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{currency('dollar')}} {{number_format($gtotal,2)}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment__history mb-30">
                                <h3 class="payment__history--title mb-20">Payment</h3>
                                <ul class="payment__history--inner d-flex">
                                    <li class="payment__history--list">
                                        <button class="payment__history--link primary__btn" type="button"><label for="cod">COD</label></button>
                                        <input type="radio" name="mode" value="COD" id="cod">
                                    </li>
                                    <!-- <li class="payment__history--list">
                                        <button class="payment__history--link primary__btn" type="button"><label for="PayU">PayUmoney</label></button>
                                        <input type="radio" name="mode" value="PayUMoney" id="PayU">
                                    </li> -->
                                    <li class="payment__history--list">
                                        <button class="payment__history--link primary__btn" type="button"><label for="paypal">Paypal</label></button>
                                        <input type="radio" name="mode" value="paypal" id="paypal">
                                    </li>
                                </ul>
                            </div>
                            <button class="checkout__now--btn primary__btn" type="submit">Make Order</button>
                        </aside>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End checkout page area -->

    <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section section--padding pt-0">
        <div class="container">
            <div class="newsletter__banner--thumbnail position__relative">
                <img class="newsletter__banner--thumbnail__img" src="assets/frontend/img/banner/banner-bg7.webp" alt="newsletter-banner">
                <div class="newsletter__content newsletter__subscribe">
                    <h5 class="newsletter__content--subtitle text-white">Want to offer regularly ?</h5>
                    <h2 class="newsletter__content--title text-white h3 mb-25">Subscribe Our Newsletter <br>
                        for Get Daily Update</h2>
                    <form class="newsletter__subscribe--form position__relative" action="#">
                        <label>
                            <input class="newsletter__subscribe--input" placeholder="Enter your email address" type="email">
                        </label>
                        <button class="newsletter__subscribe--button primary__btn" type="submit">Subscribe
                            <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                            </svg>
                        </button>
                    </form>   
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter banner section -->
</main>
@stop
@push('scripts')
<script>
// alert('Hello');
</script>
@endpush