<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <title>{{$page->meta_title}}</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keywords" content="{{$page->meta_keywords}}">
  <meta name="description" content="{{$page->meta_description}}">

  <meta property="og:title" content="{{$page->meta_title}}"/>  
  <meta property="og:url" content="{{route('aboutus')}}" />
  <meta property="og:description" content="{{$page->meta_description}}"/>
  <meta property="og:type" content="Website"/>
  <meta property="og:site_name" content="Ecommerce" />

  <meta name="twitter:title" content="{{$page->meta_title}}" />
  <meta name="twitter:description" content="{{$page->meta_description}}" />
  <meta itemprop="title" content="{{$page->meta_title}}" />

  <meta itemprop="description" content="{{$page->meta_description}}" />
  <link rel="canonical" href="{{route('aboutus')}}" />
  <!-- required metas -->

  <!--favicon-->
  <link rel="icon" href="{{url('frontend/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{url('frontend/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet" />
  <link href="{{url('frontend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{url('frontend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{url('frontend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- loader-->
  <link href="{{url('frontend/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{url('frontend/js/pace.min.js')}}"></script>
  <!-- Bootstrap CSS -->
  <link href="{{url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="{{url('frontend/css/app.css')}}" rel="stylesheet">
  <link href="{{url('frontend/css/icons.css')}}" rel="stylesheet">
</head>

<body>  <b class="screen-overlay"></b>
  <!--wrapper-->
  <div class="wrapper">
    <!--start top header wrapper-->
    @include('frontend/layouts/header')
    <!--end top header wrapper-->
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
          <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
              <h3 class="breadcrumb-title pe-3">Checkout</h3>
              <div class="ms-auto">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
          <div class="container">
            <div class="card py-3 mt-sm-3">
              <div class="card-body text-center">
                <h2 class="h4 pb-3">Order Payment id fail!</h2>
                <p class="fs-sm mb-2">Your order has been placed but order is still unpaid.</p>
                <p class="fs-sm mb-2">Your order no is: <span class="fw-medium">{{$txnid}}.</span>
                <p class="fs-sm mb-2">You pay this order again from "My Order" section : <span class="fw-medium">{{$txnid}}.</span>
                </p>
                <p class="fs-sm">You will be receiving an email shortly with confirmation of your order.
                </p><a class="btn btn-light rounded-0 mt-3 me-3" href="index.html">Go back shopping</a><a class="btn btn-white rounded-0 mt-3" href="order-tracking.html"><i class='bx bx-map'></i>Track order</a>
              </div>
            </div>
          </div>
        </section>
        <!--end shop cart-->
      </div>
    </div>
    <!--end page wrapper -->
    <!--start footer section-->
    @include('frontend/layouts/footer')
    <!--end footer section-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
  </div>
  <!--end wrapper-->
  
  <!-- Bootstrap JS -->
  <script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{url('frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('frontend/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{url('frontend/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
  <script src="{{url('frontend/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
  <script src="{{url('frontend/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{url('frontend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <!--app JS-->
  <script src="{{url('frontend/js/app.js')}}"></script>
  @include('frontend/common')
</body>

</html>