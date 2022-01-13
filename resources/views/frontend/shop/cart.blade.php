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
								@if(count($cartpro) > 0)
								<div class="col-12 col-xl-8">
									<div class="shop-cart-list mb-3 p-3">
										@php $subtotal = 0; @endphp
										@foreach($cartpro as $cartproRow)
										<div id="cart-row-{{$cartproRow->id}}" class="row align-items-center g-3">
											<div class="col-12 col-lg-5">
												<div class="d-lg-flex align-items-center gap-2">
													<div class="cart-img text-center text-lg-start">
														<img src="{{url('uploads/product/'.$cartproRow->image)}}" width="130" alt="">
													</div>
													<div class="cart-detail text-center text-lg-start">
														<h6 class="mb-2">{{$cartproRow->product}}</h6>
														<p class="mb-0">Code: <span>{{$cartproRow->product_code}}</span>
														</p>
														<h5 class="mb-0">₹ {{number_format($cartproRow->price,2)}}</h5>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-2">
												<div class="cart-action text-center">
													<input type="number" class="form-control rounded-0" value="{{$cartproRow->quantity}}" min="1">
												</div>
											</div>
											<div class="col-12 col-lg-2">
												<div class="cart-action text-center">
													@php 
														$ptotal = $cartproRow->price * $cartproRow->quantity;
														$subtotal = $subtotal + $ptotal;
													@endphp
													₹ {{number_format($ptotal,2)}}
												</div>
											</div>
											<div class="col-12 col-lg-3">
												<div class="text-center">
													<div class="d-flex gap-2 justify-content-center justify-content-lg-end">
														<a href="javascript:;" class="btn btn-dark rounded-0 btn-ecomm" onclick="confirm('Sure! you want delete this product') ? removeCartPro({{$cartproRow->id}}) : '' "><i class='bx bx-x-circle'></i> Remove</a>
														<!-- <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a> -->
													</div>
												</div>
											</div>
											<div class="my-4 border-top"></div>
										</div>
										@endforeach
										<div class="d-lg-flex align-items-center gap-2">	
											<a href="{{route('shop')}}" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
											<a href="{{route('clear.cart')}}" class="btn btn-light btn-ecomm ms-auto" onclick="return confirm('Sure! You want to clear cart')"><i class='bx bx-x-circle'></i> Clear Cart</a>
											<!-- <a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a> -->
										</div>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="checkout-form p-3 bg-light">
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Apply Discount Code</p>
												<div class="input-group">
													<input type="text" class="form-control rounded-0" placeholder="Enter discount code">
													<button class="btn btn-dark btn-ecomm" type="button">Apply Discount</button>
												</div>
											</div>
										</div>
										<!-- <div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Estimate Shipping and Tax</p>
												<div class="my-3 border-top"></div>
												<div class="mb-3">
													<label class="form-label">Country Name</label>
													<select class="form-select rounded-0">
														<option selected>United States</option>
														<option value="1">Australia</option>
														<option value="2">India</option>
														<option value="3">Canada</option>
													</select>
												</div>
												<div class="mb-3">
													<label class="form-label">State/Province</label>
													<select class="form-select rounded-0">
														<option selected>California</option>
														<option value="1">Texas</option>
														<option value="2">Canada</option>
													</select>
												</div>
												<div class="mb-0">
													<label class="form-label">Zip/Postal Code</label>
													<input type="email" class="form-control rounded-0">
												</div>
											</div>
										</div> -->
										<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
											<div class="card-body">
												<p class="mb-2">Subtotal: <span class="float-end stotal">₹ {{number_format($subtotal,2)}}</span>
												</p>
												<!-- <p class="mb-2">Shipping: <span class="float-end">--</span>
												</p>
												<p class="mb-2">Taxes: <span class="float-end">$14.00</span>
												</p>
												<p class="mb-0">Discount: <span class="float-end">--</span>
												</p> -->
												<div class="my-3 border-top"></div>
												<h5 class="mb-0">Order Total: <span class="float-end stotal">₹ {{number_format($subtotal,2)}}</span></h5>
												<div class="my-4"></div>
												<div class="d-grid"> <a href="javascript:;" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								@else
								<div class="col-12">
									<div class="text-danger text-center">Sorry! Your cart is empty!</div>
								</div>
								@endif
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

	<script type="text/javascript">
		
		function removeCartPro(cartid){
			$.ajax({
				url:'{{route('delete.cart.product')}}',
				method:'POST',
				data:{cartid:cartid,_token:'{{csrf_token()}}'},
				success:function(response){
					if(response.status == true){
						$('.stotal').html('₹ '+response.subtotal);
					}
					$('#cart-row-'+cartid).hide();
					$('.ajaxmsgtxt').html(response.message);
					$('.ajaxmsg').show();
					setTimeout(function(){
						$('.alermsg').hide();
					},5000);
				}

			});
		}

	</script>
</body>

</html>