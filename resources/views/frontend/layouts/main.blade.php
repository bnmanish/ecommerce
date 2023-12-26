<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('uploads/setting/'.@settings()->favicon)}}">
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{url('assets/frontend/css/plugins/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/frontend/css/plugins/glightbox.min.css')}}">
  <link href="../../../../fonts.googleapis.com/css2de9a.css')}}?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" rel="stylesheet">
  <!-- Plugin css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{url('assets/frontend/css/style.css')}}">
  {!!@settings()->head_content!!}
</head>

<body>

    <!-- Start header area -->
    <header class="header__section header__transparent">
        <!-- Start Header topbar -->
        <div class="header__topbar bg__primary">
            <div class="container-fluid">
                <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                    <div class="header__shipping">
                        <p class="header__shipping--text text-white">Get Up To 80% off In your first Offer!</p>
                    </div>
                    <div class="language__currency d-none d-lg-block">
                        <ul class="d-flex align-items-center">
                            <li class="language__currency--list">
                                <a class="account__currency--link text-white" href="tel:{{@settings()->primary_contact}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 31.568 31.128">
                                            <path id="ic_phone_forwarded_24px" d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z" transform="translate(-3 -1)" fill="currentColor"/>
                                    </svg>
                                    <span>{{@settings()->primary_contact}}</span>
                                </a>
                            </li>
                            <li class="language__currency--list">
                                <a class="language__switcher text-white" href="mailto:{{@settings()->primary_email}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" viewBox="0 0 31.57 31.13"><path id="ic_email_24px" d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor"/>
                                    </svg> 
                                    <span>{{@settings()->primary_email}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Header topbar -->

        <!-- Start main header -->
        <div class="main__header header__sticky">
            <div class="container-fluid">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="{{route('home')}}"><img class="main__logo--img" src="{{url('uploads/setting/'.@settings()->site_logo)}}" alt="KarimaWilliams"></a></h1>
                    </div>
                    <div class="header__menu d-none d-lg-block">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('about.us')}}">About Us</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('products')}}">Shop</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('contact.us')}}">Contact </a>  
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account">
                        <ul class="d-flex">
                            <li class="header__account--items  header__account--search__items d-md-none">
                                <a title="Search" class="header__account--btn search__open--btn" href="javascript:void(0)">
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                                    <span class="visually-hidden">Search</span>
                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn" href="{{route('my.account')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                                    <span class="visually-hidden">My Account</span>
                                </a>
                            </li>
                            <li class="header__account--items d-md-none">
                                <a class="header__account--btn" href="{{route('wishlist')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.526" height="21.82" viewBox="0 0 24.526 21.82">
                                        <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"/>
                                    </svg>
                                      
                                    <span class="items__count wishlist">02</span> 
                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn minicart__open--btn" href="{{route('cart')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.897" height="21.565" viewBox="0 0 18.897 21.565">
                                        <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"/>
                                    </svg>
                                    <span class="items__count">{{cartCount()}}</span> 
                                </a>
                            </li>
                            @php if(Auth::user()){ $login=route('logout'); } else { $login=route('login'); } @endphp
                            <li class="header__account--items">
                                <a title="Login" class="header__account--btn" href="{{$login}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End main header -->

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas-header" tabindex="-1">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="{{route('home')}}">
                        <img src="{{url('uploads/setting/'.@settings()->site_logo)}}" alt="KarimaWilliams">
                    </a>
                    <button class="offcanvas__close--btn" aria-label="offcanvas close btn">close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{route('home')}}">Home</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{route('about.us')}}">About Us</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{route('products')}}">Shop</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{route('contact.us')}}">Contact Us</a></li>
                    </ul>
                    <div class="language__currency">
                        <ul class="align-items-center">
                            <br>
                            <li class="language__currency--list">
                                <a class="offcanvas__language--switcher" href="tel:{{@settings()->primary_contact}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 31.568 31.128">
                                            <path id="ic_phone_forwarded_24px" d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z" transform="translate(-3 -1)" fill="currentColor"/>
                                    </svg>
                                    <span>{{@settings()->primary_contact}}</span>
                                </a>
                            </li>
                            <br>
                            <li class="language__currency--list">
                                <a class="offcanvas__account--currency__menu" href="mailto:{{@settings()->primary_email}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" viewBox="0 0 31.57 31.13"><path id="ic_email_24px" d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor"/>
                                    </svg> 
                                    <span>{{@settings()->primary_email}}</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start serch box area -->
        <div class="predictive__search--box " tabindex="-1">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input" placeholder="Search Here" type="text">
                    </label>
                    <button class="predictive__search--button" aria-label="search button"><svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close btn">
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <!-- End serch box area -->
    </header>
    <!-- End header area -->

    @yield('content')

    <!-- Start footer section -->
    <footer class="footer__section footer__bg">
        <div class="container-fluid">
            <div class="main__footer">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title d-none d-md-block">About Us <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <a class="footer__logo" href="{{route('home')}}"><img src="{{url('uploads/setting/'.@settings()->site_logo2)}}" alt="KarimaWilliams"></a>
                                <p class="footer__widget--desc">Ut enim ad minim veniam, quis <br> nostrud exercitation ullamco laboris <br> nisi ut aliquip ex ea commodo.</p>
                                <div class="footer__social">
                                    <ul class="social__shear d-flex">
                                        @if(@settings()->facebook)
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="{{@settings()->facebook}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.239" height="20.984" viewBox="0 0 11.239 20.984">
                                                    <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M11.575,11.8l.583-3.8H8.514V5.542A1.9,1.9,0,0,1,10.655,3.49h1.657V.257A20.2,20.2,0,0,0,9.371,0c-3,0-4.962,1.819-4.962,5.112V8.006H1.073v3.8H4.409v9.181H8.514V11.8Z" transform="translate(-1.073)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(@settings()->twitter)
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="{{@settings()->twitter}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="19.492" viewBox="0 0 24 19.492">
                                                    <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M21.533,7.112c.015.213.015.426.015.64A13.9,13.9,0,0,1,7.553,21.746,13.9,13.9,0,0,1,0,19.538a10.176,10.176,0,0,0,1.188.061,9.851,9.851,0,0,0,6.107-2.1,4.927,4.927,0,0,1-4.6-3.411,6.2,6.2,0,0,0,.929.076,5.2,5.2,0,0,0,1.294-.167A4.919,4.919,0,0,1,.975,9.168V9.107A4.954,4.954,0,0,0,3.2,9.731,4.926,4.926,0,0,1,1.675,3.152,13.981,13.981,0,0,0,11.817,8.3,5.553,5.553,0,0,1,11.7,7.173a4.923,4.923,0,0,1,8.513-3.365A9.684,9.684,0,0,0,23.33,2.619,4.906,4.906,0,0,1,21.167,5.33,9.861,9.861,0,0,0,24,4.569a10.573,10.573,0,0,1-2.467,2.543Z" transform="translate(0 -2.254)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(@settings()->instagram)
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="{{@settings()->instagram}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.497" height="19.492" viewBox="0 0 19.497 19.492">
                                                    <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(@settings()->linkedin)
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="{{@settings()->linkedin}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19.419" height="19.419" viewBox="0 0 19.419 19.419">
                                                    <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M4.347,19.419H.321V6.454H4.347ZM2.332,4.686A2.343,2.343,0,1,1,4.663,2.332,2.351,2.351,0,0,1,2.332,4.686ZM19.415,19.419H15.4V13.108c0-1.5-.03-3.433-2.093-3.433-2.093,0-2.414,1.634-2.414,3.325v6.42H6.869V6.454H10.73V8.223h.056A4.23,4.23,0,0,1,14.6,6.129c4.075,0,4.824,2.683,4.824,6.168v7.122Z" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Linkedin</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if(@settings()->youtube)
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" target="_blank" href="{{@settings()->youtube}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                    <style>svg{fill:#f51c1c}</style><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Quick Links <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('home')}}">Home</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('about.us')}}">About Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('contact.us')}}">Contact Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('products')}}">Shop</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('cart')}}">Cart</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Account Info <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('my.account')}}">My Account</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('login')}}">Login</a></li>
                                @foreach(additionalPages() as $apage)
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{route('additional.page',$apage->slug)}}">{{$apage->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Newsletter <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__newsletter footer__widget--inner">
                                <p class="footer__newsletter--desc">Get updates by subscribe our
                                    weekly newsletter</p>
                                <form id="newsletterForm" class="newsletter__subscribe--form__style position__relative newsletterForm1">
                                    <label>
                                        <input id="new-letter-email" class="footer__newsletter--input newsletter__subscribe--input new-letter-email1" placeholder="Enter your email address" type="email">
                                    </label>
                                    <button class="footer__newsletter--button newsletter__subscribe--button primary__btn" type="submit">Subscribe
                                        <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                            <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                                        </svg>
                                    </button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom justify-content-between align-items-center text-center">
                <p class="copyright__content  m-0">{!!@settings()->copyrights!!}</p>
            </div>
        </div>
    </footer>
    <!-- End footer section -->


    <!-- Scroll top bar -->
    <button aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
    
  <!-- All Script JS Plugins here  -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{url('assets/frontend/js/plugins/swiper-bundle.min.js')}}" defer="defer"></script>
  <script src="{{url('assets/frontend/js/plugins/glightbox.min.js')}}" defer="defer"></script>

  <!-- Customscript js -->
  <script src="{{url('assets/frontend/js/script.js')}}" defer="defer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.newsletterForm').submit(function(event) {
                event.preventDefault();
                var email = $('.new-letter-email').val();
                $.ajax({
                    url: "{{route('subscribe.news.letter')}}",
                    type: 'POST',
                    data: {_token: '{{csrf_token()}}', email: email },
                    success: function(response) {
                        console.log(response);
                        if(response.status == true){
                            alert(response.message);
                        }
                        if(response.status == false){
                            alert(response.message.email);
                        }
                        $('.new-letter-email').val('');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.newsletterForm1').submit(function(event) {
                event.preventDefault();
                var email = $('.new-letter-email1').val();
                $.ajax({
                    url: "{{route('subscribe.news.letter')}}",
                    type: 'POST',
                    data: {_token: '{{csrf_token()}}', email: email },
                    success: function(response) {
                        console.log(response);
                        if(response.status == true){
                            alert(response.message);
                        }
                        if(response.status == false){
                            alert(response.message.email);
                        }
                        $('.new-letter-email').val('');
                    }
                });
            });
        });
    </script>

  @stack('scripts')
</body>
</html>