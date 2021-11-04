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
	<link href="{{url('frontend/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{url('frontend/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{url('frontend/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{url('frontend/css/app.css')}}" rel="stylesheet">
	<link href="{{url('frontend/css/icons.css')}}" rel="stylesheet">
</head>

<body>	<b class="screen-overlay"></b>
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
							<h3 class="breadcrumb-title pe-3">{{$page->title}}</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i> Home</a>
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
				<section class="">
					<div class="container">
						<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
							<div class="row row-cols-1 row-cols-xl-2">
								<div class="col mx-auto">
									<div class="card">
										<div class="card-body">
											<div class="border p-4 rounded">
												<div class="text-center">
													<h3 class="">Sign in</h3>
													<p>Don't have an account yet? <a href="{{route('signup')}}">Sign up here</a>
													</p>
												</div>
												<div class="d-grid">
													<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
														<img class="me-2" src="{{url('frontend/images/icons/search.svg')}}" width="16" alt="Image Description">
														<span>Sign in with Google</span>
														</span>
													</a> <a href="javascript:;" class="btn btn-white"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
												</div>
												<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
													<hr/>
												</div>
												<div class="form-body">
													<form class="row g-3" method="post" action="{{route('user.login')}}">
														@csrf
														<div class="col-12">
															<label for="inputEmailAddress" class="form-label">Email Address</label>
															<input type="email" class="form-control" id="inputEmailAddress" placeholder="email" name="email">
														</div>
														<div class="col-12">
															<label for="inputChoosePassword" class="form-label">Enter Password</label>
															<div class="input-group" id="show_hide_password">
																<input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="********" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-check form-switch">
																<input name="remember" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="remember" checked>
																<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
															</div>
														</div>
														<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
														</div>
														<div class="col-12">
															<div class="d-grid">
																<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
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
	<!--Password show & hide js -->
	<script src="{{url('frontend/js/show-hide-password.js')}}"></script>
	@include('frontend/common')
</body>

</html>