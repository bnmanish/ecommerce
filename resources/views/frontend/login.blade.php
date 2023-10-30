@extends('frontend/layouts/main')
@section('title', 'Login : : TimyShop')
@section('content')
<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Login</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <div class="login__section--inner">
                <div class="row row-cols-md-2 row-cols-1">
                    <div class="col">
                        
                        <form action="{{route('logedin')}}" method="post">
                            @csrf
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Login</h3>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                @if(Session::has('success'))
                                    <p class="text-danger">{{Session::get('success')}}</p>
                                @endif
                                <div class="account__login--inner">
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="Email Addres" type="email" name="email">
                                    </label>
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="Password" type="password" name="password">
                                    </label>
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox" name="remembe">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Remember me</label>
                                        </div>
                                        <button class="account__login--forgot" type="submit">Forgot Your Password?</button>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        
                        <form method="post" action="{{route('sign.up')}}">
                            @csrf
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Create an Account</h3>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                @endif
                                @if(Session::has('success'))
                                    <p class="text-danger">{{Session::get('success')}}</p>
                                @endif
                                <div class="account__login--inner">
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="name" type="text" name="name">
                                    </label>
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="mobile" type="text" name="mobile">
                                    </label>
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="Email Addres" type="email" name="email">
                                    </label>
                                    <label class="w-100">
                                        <input class="account__login--input" placeholder="Password" type="password" name="password">
                                    </label>
                                    
                                    <div class="account__login--remember position__relative mb-3">
                                        <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            I have read and agree to the terms & conditions</label>
                                    </div>

                                    <label class="w-100">
                                        <button class="account__login--btn primary__btn mb-10" type="submit">Submit & Register</button>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
    </div>
    <!-- End login section  -->

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
</script>
@endpush