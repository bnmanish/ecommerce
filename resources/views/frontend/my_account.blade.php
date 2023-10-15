@extends('frontend/layouts/main')
@section('title', 'Home : : TimyShop')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">My Account</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
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
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                    @foreach($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">#{{$order->order_no}}</td>
                                        <td class="account__table--body__child--items">{{date('d-M-Y',strtotime($order->created_at))}}</td>
                                        <td class="account__table--body__child--items">{{$order->status === '2' ? 'Paid' : 'Unpaid'}}</td>
                                        <td class="account__table--body__child--items">{{$order->payment_ref_no ?? 'Not Available'}}</td>
                                        <td class="account__table--body__child--items">{{$order->grand_total}}</td>
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