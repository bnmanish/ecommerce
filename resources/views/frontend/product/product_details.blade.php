@php
	$wishlistclass = "btn-dark";
	$wishbtnval = "<i class='bx bx-heart'></i> Add to Wishlist";
	if(in_array($product->id,$wisharr)){
		$wishlistclass = "btn-danger";
		$wishbtnval = "<i class='bx bx-heart'></i> Remove From Wishlist";
	}

	$cartclass = "btn-dark";
	$btnlvl = "<i class='bx bxs-cart-add'></i> Add to Cart";
	if(Auth::user()){
		if(in_array($product->id,$cartarr)){
			$cartclass = "btn-danger";
			$btnlvl = "<i class='bx bxs-cart-add'></i> Remove from Cart";

		}
	}else{
		if(in_array($product->id,Session::get('proid') ? : array())){
			$cartclass = "btn-danger";
			$btnlvl = "<i class='bx bxs-cart-add'></i> Remove from Cart";

		}
	}
	

@endphp
<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<title>{{$product->meta_title}}</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="keywords" content="{{$product->meta_keywords}}">
	<meta name="description" content="{{$product->meta_description}}">

	<meta property="og:title" content="{{$product->meta_title}}"/>  
	<meta property="og:url" content="{{route('product.details',$product->url)}}" />
	<meta property="og:description" content="{{$product->meta_description}}"/>
	<meta property="og:type" content="Website"/>
	<meta property="og:site_name" content="Ecommerce" />

	<meta name="twitter:title" content="{{$product->meta_title}}" />
	<meta name="twitter:description" content="{{$product->meta_description}}" />
	<meta itemprop="title" content="{{$product->meta_title}}" />

	<meta itemprop="description" content="{{$product->meta_description}}" />
	<link rel="canonical" href="{{route('product.details',$product->url)}}" />
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
	<title>Shopingo - eCommerce HTML Template</title>
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
							<h3 class="breadcrumb-title pe-3">{{$product->product}}</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">{{$product->product}}</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start product detail-->
				<section class="py-4">
					<div class="container">
						<div class="product-detail-card">
							<div class="product-detail-body">
								<div class="row g-0">
									<div class="col-12 col-lg-5">
										<img src="{{url('uploads/product/'.$product->image)}}" class="img-fluid" alt="{{$product->product}}">
									</div>
									<div class="col-12 col-lg-7">
										<div class="product-info-section p-3">
											<h3 class="mt-3 mt-lg-0 mb-0">{{$product->product}}</h3>
											<div class="product-rating d-flex align-items-center mt-2">
												<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-warning"></i>
													<i class="bx bxs-star text-light-4"></i>
												</div>
												<div class="ms-1">
													<p class="mb-0">(24 Ratings)</p>
												</div>
											</div>
											<div class="d-flex align-items-center mt-3 gap-2">
												<!-- <h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5> -->
												<h4 class="mb-0">₹ {{$product->price}}</h4>
											</div>
											
											<dl class="row mt-3">	
												<dt class="col-sm-3">Product id</dt>
												<dd class="col-sm-9">{{$product->product_code}}</dd>	
												<!-- <dt class="col-sm-3">Delivery</dt>
												<dd class="col-sm-9">In India Only</dd> -->
											</dl>
											<div class="row row-cols-auto align-items-center mt-3">
												<!-- <div class="col">
													<select class="form-select form-select-sm">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div> -->
												<div class="col">
													<a href="javascript:;" class="btn btn-ecomm @php echo $cartclass; @endphp procart-{{$product->id}}" onclick="return addCart({{$product->id}})">	<?=$btnlvl?></a>
												</div>
												<div class="col">
													<a href="javascript:;" class="btn btn-ecomm @php echo $wishlistclass; @endphp prowishdet-{{$product->id}}" onclick="return addWishlist({{$product->id}})"><?=$wishbtnval?></a>
												</div>
											</div>
											<hr/>
											<div class="product-sharing">
												<ul class="list-inline">
													<li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-facebook'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-linkedin'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-twitter'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-instagram'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-google'></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<!--end product detail-->
				<!--start product more info-->
				<section class="py-4">
					<div class="container">
						<div class="product-more-info">
							<ul class="nav nav-tabs mb-0" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Description</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">(3) Reviews</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="discription" role="tabpanel">

									{!!$product->description!!}

								</div>
								
								<div class="tab-pane fade" id="reviews" role="tabpanel">
									<div class="row">
										<div class="col col-lg-8">
											<div class="product-review">
												<h5 class="mb-4">3 Reviews For The Product</h5>
												<div class="review-list">
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="{{url('frontend/images/avatars/avatar-1.png')}}" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">	<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-light-4"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">James Caviness</h6>
																<p class="mb-0 ms-auto">February 16, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
													<hr/>
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="{{url('frontend/images/avatars/avatar-2.png')}}" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6"> <i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-light-4"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">David Buckley</h6>
																<p class="mb-0 ms-auto">February 22, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
													<hr/>
													<div class="d-flex align-items-start">
														<div class="review-user">
															<img src="{{url('frontend/images/avatars/avatar-3.png')}}" width="65" height="65" class="rounded-circle" alt="" />
														</div>
														<div class="review-content ms-3">
															<div class="rates cursor-pointer fs-6">	<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-white"></i>
																<i class="bx bxs-star text-light-4"></i>
															</div>
															<div class="d-flex align-items-center mb-2">
																<h6 class="mb-0">Peter Costanzo</h6>
																<p class="mb-0 ms-auto">February 26, 2021</p>
															</div>
															<p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col col-lg-4">
											<div class="add-review bg-dark-1">
												<div class="form-body p-3">
													<h4 class="mb-4">Write a Review</h4>
													<div class="mb-3">
														<label class="form-label">Your Name</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Your Email</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="mb-3">
														<label class="form-label">Rating</label>
														<select class="form-select rounded-0">
															<option selected>Choose Rating</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="3">4</option>
															<option value="3">5</option>
														</select>
													</div>
													<div class="mb-3">
														<label class="form-label">Example textarea</label>
														<textarea class="form-control rounded-0" rows="3"></textarea>
													</div>
													<div class="d-grid">
														<button type="button" class="btn btn-light btn-ecomm">Submit a Review</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end row-->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--end product more info-->
				<!--start similar products-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Similar Products</h5>
							<div class="d-flex align-items-center gap-0 ms-auto">	<a href="javascript:;" class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
								<a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
							</div>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="similar-products owl-carousel owl-theme">
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/01.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/02.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/03.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>4.9</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/04.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/05.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>3.9</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/06.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<img src="{{url('frontend/images/similar-products/07.png')}}" class="card-img-top" alt="...">
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">Product Short Name</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
														<span class="text-white fs-5">$49.00</span>
													</div>
													<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm"><i class='bx bx-zoom-in'></i>Quick View</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--end similar products-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start footer section-->
		@include('frontend/layouts/footer')
		<!--end footer section-->
		<!--start quick view product-->
		<!-- Modal -->
		<div class="modal fade" id="QuickViewProduct">
			<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
				<div class="modal-content bg-dark-4 rounded-0 border-0">
					<div class="modal-body">
						<button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
						<div class="row g-0">
							<div class="col-12 col-lg-6">
								<div class="image-zoom-section">
									<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
										<div class="item">
											<img src="{{url('frontend/images/product-gallery/01.png')}}" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="{{url('frontend/images/product-gallery/02.png')}}" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="{{url('frontend/images/product-gallery/03.png')}}" class="img-fluid" alt="">
										</div>
										<div class="item">
											<img src="{{url('frontend/images/product-gallery/04.png')}}" class="img-fluid" alt="">
										</div>
									</div>
									<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
										<button class="owl-thumb-item">
											<img src="{{url('frontend/images/product-gallery/01.png')}}" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="{{url('frontend/images/product-gallery/02.png')}}" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="{{url('frontend/images/product-gallery/03.png')}}" class="" alt="">
										</button>
										<button class="owl-thumb-item">
											<img src="{{url('frontend/images/product-gallery/04.png')}}" class="" alt="">
										</button>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="product-info-section p-3">
									<h3 class="mt-3 mt-lg-0 mb-0">Allen Solly Men's Polo T-Shirt</h3>
									<div class="product-rating d-flex align-items-center mt-2">
										<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-warning"></i>
											<i class="bx bxs-star text-light-4"></i>
										</div>
										<div class="ms-1">
											<p class="mb-0">(24 Ratings)</p>
										</div>
									</div>
									<div class="d-flex align-items-center mt-3 gap-2">
										<h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5>
										<h4 class="mb-0">$49.00</h4>
									</div>
									<div class="mt-3">
										<h6>Discription :</h6>
										<p class="mb-0">Virgil Abloh’s Off-White is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown Odsy-1000 low-top sneakers.</p>
									</div>
									<dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
										<dd class="col-sm-9">#BHU5879</dd>	<dt class="col-sm-3">Delivery</dt>
										<dd class="col-sm-9">Russia, USA, and Europe</dd>
									</dl>
									<div class="row row-cols-auto align-items-center mt-3">
										<div class="col">
											<label class="form-label">Quantity</label>
											<select class="form-select form-select-sm">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
										<div class="col">
											<label class="form-label">Size</label>
											<select class="form-select form-select-sm">
												<option>S</option>
												<option>M</option>
												<option>L</option>
												<option>XS</option>
												<option>XL</option>
											</select>
										</div>
										<div class="col">
											<label class="form-label">Colors</label>
											<div class="color-indigators d-flex align-items-center gap-2">
												<div class="color-indigator-item bg-primary"></div>
												<div class="color-indigator-item bg-danger"></div>
												<div class="color-indigator-item bg-success"></div>
												<div class="color-indigator-item bg-warning"></div>
											</div>
										</div>
									</div>
									<!--end row-->
									<div class="d-flex gap-2 mt-3">
										<a href="javascript:;" class="btn btn-white btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
		<!--end quick view product-->
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
	<script src="{{url('frontend/js/product-details.js')}}"></script>
	@include('frontend/common')
</body>

</html>