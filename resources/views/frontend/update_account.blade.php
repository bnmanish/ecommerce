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
                        <li class="account__menu--list"><a href="{{route('my.account')}}">My Orders</a></li>
                        <li class="account__menu--list active"><a href="{{route('update.account')}}">Update Account</a></li>
                        <li class="account__menu--list"><a href="{{route('logout')}}">Log Out</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">Update Account</h3>
                        <div class="account__table--area">
                            <div class="contact__form">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                @if(Session::has('success'))
                                    <p class="text-danger">{{Session::get('success')}}</p>
                                @endif
                                <form class="contact__form--inner" method="post"  action="{{route('update.account.save')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="contact__form--list mb-20">
                                                <label class="contact__form--label" for="name">Name <span class="contact__form--label__star">*</span></label>
                                                <input class="contact__form--input" name="name" id="name" placeholder="Name" type="text" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="contact__form--list mb-20">
                                                <label class="contact__form--label" for="email">Email <span class="contact__form--label__star">*</span></label>
                                                <input class="contact__form--input" name="email" id="email" placeholder="Email" type="text" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="contact__form--list mb-20">
                                                <label class="contact__form--label" for="user_name">User Name</label>
                                                <input class="contact__form--input" name="user_name" id="user_name" placeholder="User Name" type="text" value="{{Auth::user()->user_name}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="contact__form--list mb-20">
                                                <label class="contact__form--label" for="mobile">Mobile <span class="contact__form--label__star">*</span></label>
                                                <input class="contact__form--input" name="mobile" id="mobile" placeholder="Mobile" type="text" value="{{Auth::user()->mobile}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="contact__form--list mb-20">
                                                <label class="contact__form--label" for="password">Password </label>
                                                <input class="contact__form--input" name="password" id="password" placeholder="Password" type="text">
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <button class="contact__form--btn primary__btn" type="submit">Update</button>  
                                    <p class="form-messege"></p>
                                </form>
                            </div>
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