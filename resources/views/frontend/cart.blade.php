@extends('frontend/layouts/main')
@section('title', $page->meta_title)
@section('keywords', $page->meta_keywords)
@section('description', $page->meta_description)
@section('content')
<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container-fluid">
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

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <form action="{{route('update.cart')}}" method="post"> 
                    @csrf
                    <h2 class="cart__title mb-40">Cart</h2>
                    <div class="row">
                        @if(@$cart->details)
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">
                                        @php
                                            $gtotal = 0;
                                            $subTotal = 0;
                                            $tax = 0;
                                            $shippingCharge = 0;
                                            $couponDiscount = 0;
                                        @endphp
                                        @foreach($cart->details as $cartItem)
                                        <input type="hidden" name="cart_details_id[]" value="{{$cartItem->id}}">
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                                    <a href="{{route('delete.cart.product',['cartId'=>$cart->id,'cartDetId'=>$cartItem->id])}}" class="cart__remove--btn" aria-label="search button" type="button"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg></a>
                                                    <div class="cart__thumbnail">
                                                        <a href="{{route('products.details',$cartItem->product->slug)}}"><img class="border-radius-5" src="{{url('uploads/product/'.$cartItem->product->images->first()->image)}}" alt="{{$cartItem->product->title}}"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="{{route('products.details',$cartItem->product->slug)}}">{{$cartItem->product->title}}</a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                @php

                                                    $price = 0;
                                                    if($cartItem->product->discount_price > 0 ){
                                                        $price = $cartItem->product->discount_price;
                                                    }else{
                                                        $price = $cartItem->product->price;
                                                    }

                                                @endphp
                                                <span class="cart__price">{{currency('dollar')}} {{number_format($price,2)}}</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number" class="quantity__number quickview__value--number" value="{{$cartItem->quantity}}" name="quantities[]" />
                                                    </label>
                                                    <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                @php 
                                                    $productTotal = $price * $cartItem->quantity; 
                                                    $subTotal += $productTotal;
                                                @endphp
                                                <span class="cart__price end">{{currency('dollar')}} {{number_format($productTotal,2)}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{route('products')}}">Continue shopping</a>
                                    <button class="continue__shopping--clear" type="button" onclick="return clearCart()">Clear Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <!-- <div class="coupon__code mb-30">
                                    <h3 class="coupon__code--title">Coupon</h3>
                                    <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                    <div class="coupon__code--field d-flex">
                                        <label>
                                            <input class="coupon__code--field__input border-radius-5" placeholder="Coupon code" type="text">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn" type="submit">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Add special instructions for your seller...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div> -->
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right">{{currency('dollar')}} {{number_format($subTotal,2)}}</td>
                                            </tr>
                                            <!-- <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">TAX</td>
                                                <td class="cart__summary--amount text-right">$ {{number_format($tax,2)}}</td>
                                            </tr> -->
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SHIPPING CHARGE</td>
                                                <td class="cart__summary--amount text-right">{{currency('dollar')}} {{number_format($shippingCharge,2)}}</td>
                                            </tr>
                                            <!-- <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">COUPON CHARGE</td>
                                                <td class="cart__summary--amount text-right">$ {{number_format($couponDiscount,2)}}</td>
                                            </tr> -->
                                            @php 
                                                $gtotal = $subTotal + $tax + $shippingCharge - $couponDiscount;
                                            @endphp
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                <td class="cart__summary--amount text-right">{{currency('dollar')}} {{number_format($gtotal,2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <ul class="d-flex justify-content-between">
                                        <li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li>
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{route('checkout')}}">Check Out</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                        @else
                        <div class="col-lg-12 text-center border">
                            <br>
                            <br>
                            <br>
                            <div>No product in cart</div>
                            <br>
                            <br>
                            <br>
                        </div>
                        @endif
                    </div> 
                </form> 
            </div>
        </div>     
    </section>
    <!-- cart section end -->

</main>
@stop
@push('scripts')
<script>
    function clearCart(){
        var con = confirm("Sure! Do you want to clear the cart ?");
        if(!con){
            return false;
        }
        $.ajax({
            url: "{{route('clear.cart')}}",
            type: "GET",
            success: function(response) {
                location. reload();
            },
        });
    }
</script>
@endpush