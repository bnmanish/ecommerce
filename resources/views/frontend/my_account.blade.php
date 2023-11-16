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
    
    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible mb-2">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible mb-2">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  {{ Session::get('error') }}
                </div>
            @endif

            <p class="account__welcome--text">Hello, Admin welcome to your dashboard!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h3 class="account__content--title mb-20">My Profile</h3>
                    <ul class="account__menu">
                        <li class="account__menu--list active"><a href="{{route('my.account')}}">My Orders</a></li>
                        <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                        <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
                        <li class="account__menu--list"><a href="{{route('logout')}}">Log Out</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">Orders History</h3>
                        <div class="account__table--area">
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items">Order</th>
                                        <th class="account__table--header__child--items">Date</th>
                                        <th class="account__table--header__child--items">Payment Status</th>
                                        <th class="account__table--header__child--items">Payment Ref No</th>
                                        <th class="account__table--header__child--items">Total</th>	 	 	 	
                                        <th class="account__table--header__child--items">Action</th>             
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                    @foreach($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">#{{$order->order_no}}</td>
                                        <td class="account__table--body__child--items">{{date('d-M-Y',strtotime($order->created_at))}}</td>
                                        <td class="account__table--body__child--items">{{$order->status === '2' ? 'Paid' : 'Unpaid'}}</td>
                                        <td class="account__table--body__child--items">{{$order->payment_ref_no ?? 'Not Available'}}</td>
                                        <td class="account__table--body__child--items">{{currency('inr')}} {{$order->grand_total}}</td>
                                        <td class="account__table--body__child--items">
                                            <a target="_blank" href="{{route('order.invoice',$order->order_no)}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section section--padding pt-0">
        <div class="container">
            <div class="newsletter__banner--thumbnail position__relative">
                <img class="newsletter__banner--thumbnail__img" src="{{url('assets/frontend/img/banner/banner-bg7.webp')}}" alt="newsletter-banner">
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