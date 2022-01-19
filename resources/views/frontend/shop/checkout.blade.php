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
										<li class="breadcrumb-item"><a href="{{route('home')}}"><i
													class="bx bx-home-alt"></i> Home</a>
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
						<div class="shop-cart">
							<div class="row">
								<div class="col-12 col-xl-8">
									<div class="checkout-details">
										<div class="card rounded-0">
											<div class="card-body">
												<!-- form starts here -->
												<form method="post" action="{{route('place.order')}}">
													@csrf
													<div class="border p-3">
													
														<h2 class="h5 mb-0">Address</h2>
														<div class="my-3 border-bottom"></div>
														<div class="form-body row">
															
															<input type="hidden" name="cc" value="{{$couponcode}}">
															<div class="col-md-6">
																<label class="form-label">Name <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 name" name="name" value="{{Auth::user()->name}}">
															</div>
															<div class="col-md-6">
																<label class="form-label">E-mail <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 email" name="email" value="{{Auth::user()->email}}">
															</div>
															<div class="col-md-6">
																<label class="form-label">Phone Number <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 contact" name="contact" value="{{Auth::user()->contact}}">
															</div>
															
															<div class="col-md-6">
																<label class="form-label">Pincode <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 pincode" name="pincode">
															</div>

															<div class="col-md-6">
																<label class="form-label">Area <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 area" name="area">
															</div>

															<div class="col-md-6">
																<label class="form-label">Landmark</span></label>
																<input type="text" class="form-control rounded-0 landmark" name="landmark">
															</div>

															<div class="col-md-6">
																<label class="form-label">State <span class="text-danger">*</span></label>
																<input type="text" class="form-control rounded-0 state" name="state">
															</div>

															<div class="col-md-6">
																<label class="form-label">Country</label>
																<input type="text" class="form-control rounded-0 country" name="country">
															</div>

														</div>


														<div class="card-header border-bottom mt-3">
															<h2 class="h5 my-2">Choose Payment Method</h2>
														</div>

														<ul class="nav nav-pills mb-3 border p-3" role="tablist">
															<li class="nav-item" role="presentation">
																<a class="nav-link active rounded-0" data-bs-toggle="pill" href="#cod" role="tab" aria-selected="true">
																	<div class="d-flex align-items-center">
																		<div class="tab-icon"><i class='bx bx-money font-18 me-1'></i>
																		</div>
																		<div class="tab-title">Cash On Delivery</div>
																	</div>
																</a>
															</li>
															<li class="nav-item" role="presentation">
																<a class="nav-link rounded-0" data-bs-toggle="pill" href="#payumoney" role="tab" aria-selected="false">
																	<div class="d-flex align-items-center">
																		<div class="tab-icon"><i class='bx bxl-paypal font-18 me-1'></i>
																		</div>
																		<div class="tab-title">PayuMoney</div>
																	</div>
																</a>
															</li>
														</ul>

														<div class="tab-content" id="pills-tabContent">
															<div class="tab-pane fade show active" id="cod" role="tabpanel">
																<div class="p-3 border">
																	<div class="row">
																		<div class="col-md-6">
																			<div class="d-grid">	<a href="{{route('cart')}}" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="d-grid">
																				<button type="submit" class="btn btn-dark btn-ecomm" onclick="return palaceorder('cod')" name="payment_method" value="Cash on Delivery" >Place Order<i class='bx bx-chevron-right'></i>
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane fade" id="payumoney" role="tabpanel">
																<div class="p-3 border">
																	<div class="row">
																		<div class="col-md-6">
																			<div class="d-grid">	<a href="{{route('cart')}}" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="d-grid">
																				<button class="btn btn-dark btn-ecomm" type="submit" onclick="palaceorder('payumoney')" name="payment_method" value="PayUmoney">Place Order<i class='bx bx-chevron-right'></i>
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													
													</div>
												</form>
												<!-- form ends here -->
											</div>
										</div>

									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="order-summary">
										<div class="card rounded-0">
											<div class="card-body">
												
												<div class="card rounded-0 border bg-transparent shadow-none">
													<div class="card-body">
														<p class="fs-5">Order summary</p>
														@php $subtotal = 0; @endphp
														@foreach($cartpro as $cartproRow)
														<div class="my-3 border-top"></div>
														<div class="d-flex align-items-center">
															<a class="d-block flex-shrink-0" href="javascript:;">
																<img src="{{url('uploads/product/'.$cartproRow->image)}}" width="75" alt="{{$cartproRow->product}}">
															</a>
															<div class="ps-2">
																<h6 class="mb-1"><a href="javascript:;" class="text-dark">{{$cartproRow->product}}</a></h6>
																<div class="widget-product-meta"><span class="me-2">₹ {{$cartproRow->price}}<span class="">x {{$cartproRow->quantity}}</span>
																</div>
															</div>
														</div>
															@php
																$subtotal = $subtotal + ($cartproRow->price * $cartproRow->quantity);
															@endphp
														@endforeach
													</div>
												</div>
												<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
													<div class="card-body">
														<p class="mb-2">Subtotal: <span class="float-end">₹ {{number_format($subtotal,2)}}</span>
														</p>
														@if($discountval != false && $discount_type != false)
															@php
																if($discount_type == 0){
													                $discount = $discountval;
													                $total = $subtotal - $discount;
													            }
													            if($discount_type == 1){
													                $discount = (($subtotal * $discountval)/100);
													                $total = $subtotal - $discount;
													            }
															@endphp
															<p class="mb-0 text-danger">Discount: <span class="float-end">- ₹ {{number_format($discount,2)}}</span></p>
														@else
															@php $total = $subtotal; @endphp
														@endif
														<div class="my-3 border-top"></div>
														<h5 class="mb-0">Order Total : <span class="float-end">₹ {{number_format($total,2)}}</span></h5>
													</div>
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

	<script>
		
		function palaceorder(payment_mode){
			var name = $('.name').val();
			var email = $('.email').val();
			var contact = $('.contact').val();
			var pincode = $('.pincode').val();
			var area = $('.area').val();
			var state = $('.state').val();
			var country = $('.country').val();

			if(name == ''){
				alert('Name is required!');
				$('.name').focus();
				return false;
			}

			if(email == ''){
				alert('Email is required!');
				$('.email').focus();
				return false;
			}

			if(contact == ''){
				alert('Phone no is required!');
				$('.contact').focus();
				return false;
			}

			if(pincode == ''){
				alert('Pincode is required!');
				$('.pincode').focus();
				return false;
			}

			if(area == ''){
				alert('Area is required!');
				$('.area').focus();
				return false;
			}

			if(state == ''){
				alert('State is required!');
				$('.state').focus();
				return false;
			}

			if(country == ''){
				alert('Country is required!');
				$('.country').focus();
				return false;
			}






		}

	</script>

</body>

</html>