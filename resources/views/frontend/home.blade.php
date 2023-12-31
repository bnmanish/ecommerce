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
	<meta property="og:url" content="{{url('/')}}" />
	<meta property="og:description" content="{{$page->meta_description}}"/>
	<meta property="og:type" content="Website"/>
	<meta property="og:site_name" content="Ecommerce" />

	<meta name="twitter:title" content="{{$page->meta_title}}" />
	<meta name="twitter:description" content="{{$page->meta_description}}" />
	<meta itemprop="title" content="{{$page->meta_title}}" />

	<meta itemprop="description" content="{{$page->meta_description}}" />
	<link rel="canonical" href="{{url('/')}}" />
	
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
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
	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> -->
	<link href="{{url('frontend/css/app.css')}}" rel="stylesheet">
	<link href="{{url('frontend/css/icons.css')}}" rel="stylesheet">

	
</head>

<body>

	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">

		@include('frontend/layouts/header')
		<!--start slider section-->
		<section class="slider-section">
			<div class="first-slider">
				<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
					<ol class="carousel-indicators">
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
						<li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						@php $s=1; @endphp
						@foreach($slider as $sliderRow)
						<div class="carousel-item bg-dark-gery @if($s++ == 1) active @endif">
							<div class="row d-flex align-items-center">
								<div class="col d-none d-lg-flex justify-content-center">
									<div class="">
										<h3 class="h3 fw-light">{{$sliderRow->text1}}</h3>
										<h1 class="h1">{{$sliderRow->text2}}</h1>
										<p class="pb-3">{{$sliderRow->text3}}</p>
										<div class=""> <a class="btn btn-dark btn-ecomm" href="{{$sliderRow->link}}">Shop Now <i class='bx bx-chevron-right'></i></a>
										</div>
									</div>
								</div>
								<div class="col">
									<img src="{{url('uploads/slider/'.$sliderRow->image)}}" class="img-fluid" alt="{{$sliderRow->title}}">
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</a>
				</div>
			</div>
		</section>
		<!--end slider section-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start information-->
				<section class="py-3 border-top border-bottom">
					<div class="container">
						<div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-taxi'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
										<p class="mb-0">Free shipping on all orders over $49</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-dollar-circle'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">MONEY BACK GUARANTEE</h6>
										<p class="mb-0">100% money back guarantee</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-support'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
										<p class="mb-0">Awesome Support for 24/7 Days</p>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end information-->
				<!--start pramotion-->
				<section class="py-4">
					<div class="container">
						<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
							@foreach($randomcat as $randomcatRow)
							<div class="col">
								<div class="card rounded-0 border shadow-none">
									<div class="row g-0 align-items-center">
										<div class="col">
											<img src="{{url('uploads/category/'.$randomcatRow->image)}}" class="img-fluid" alt="" />
										</div>
										<div class="col">
											<div class="card-body">
												<h5 class="card-title text-uppercase">{{$randomcatRow->category}}</h5>
												<p class="card-text text-uppercase">Best Offer Available</p>	<a href="javascript:;" class="btn btn-dark btn-ecomm">SHOP NOW</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end pramotion-->
				<!--start Featured product-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
							<a href="javascript:;" class="btn btn-dark btn-ecomm ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
								@foreach($featuredpro as $featuredproRow)
								@php
									$wishlistclass = "";
									if(in_array($featuredproRow->id,$wisharr)){
										$wishlistclass = "bg-danger text-white";
									}

									$cartclass = "btn-dark";
									$btnlvl = "<i class='bx bxs-cart-add'></i> Add to Cart";
									if(in_array($featuredproRow->id,$cartArr)){
										$cartclass = "btn-danger";
										$btnlvl = "<i class='bx bxs-cart-add'></i> Remove from Cart";
									}

								@endphp
								<div class="col">
									<div class="card rounded-0 product-card prcard">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="javascript:;" onclick="return addWishlist({{$featuredproRow->id}})">
													<div class="prowish-{{$featuredproRow->id}} product-wishlist @php echo $wishlistclass; @endphp "> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a href="{{route('product.details',$featuredproRow->url)}}">
											<img src="{{url('uploads/product/'.$featuredproRow->image)}}" class="card-img-top" alt="{{$featuredproRow->product}}">
										</a>
										<div class="card-body">
											<div class="product-info">
												<!-- <a href="javascript:;">
													<p class="product-catergory font-13 mb-1">Catergory Name</p>
												</a> -->
												<a href="javascript:;">
													<h6 class="product-name mb-2">{{$featuredproRow->product}}</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price">
														<!-- <span class="me-1 text-decoration-line-through">$99.00</span> -->
														<span class="fs-5">₹ {{$featuredproRow->price}}</span>
													</div>
													<div class="cursor-pointer ms-auto">
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" onclick="return addCart({{$featuredproRow->id}})" class="procart-{{$featuredproRow->id}} btn btn-ecomm @php echo $cartclass; @endphp">	<?=$btnlvl?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end Featured product-->
				<!--start New Arrivals-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">New Arrivals</h5>
							<a href="javascript:;" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="new-arrivals owl-carousel owl-theme">
								@foreach($newarrival as $newarrivalRow)
								@php
									$wishlistclass = "";
									if(in_array($newarrivalRow->id,$wisharr)){
										$wishlistclass = "bg-danger text-white";
									}

									$cartclass = "btn-dark";
									$btnlvl = "<i class='bx bxs-cart-add'></i> Add to Cart";
									if(in_array($newarrivalRow->id,$cartArr)){
										$cartclass = "btn-danger";
										$btnlvl = "<i class='bx bxs-cart-add'></i> Remove from Cart";
									}

								@endphp
								<div class="item">
									<div class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0">
											<div class="d-flex align-items-center justify-content-end">
												<a href="javascript:;" onclick="return addWishlist({{$newarrivalRow->id}})">
													<div class="prowish-{{$newarrivalRow->id}} product-wishlist @php echo $wishlistclass; @endphp "> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a href="{{route('product.details',$newarrivalRow->url)}}">
											<img src="{{url('uploads/product/'.$newarrivalRow->image)}}" class="card-img-top" alt="{{$newarrivalRow->title}}">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<h6 class="product-name mb-2">{{$newarrivalRow->product}}</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price"> 
														<!-- <span class="me-1 text-decoration-line-through">$99.00</span> -->
														<span class="fs-5">₹ {{$newarrivalRow->price}}</span>
													</div>
													<div class="cursor-pointer ms-auto">
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
														<i class="bx bxs-star text-warning"></i>
													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
														<a href="javascript:;" onclick="return addCart({{$newarrivalRow->id}})" class="procart-{{$newarrivalRow->id}} btn btn-ecomm @php echo $cartclass; @endphp"> <?=$btnlvl?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</section>
				<!--end New Arrivals-->

				<!--start categories-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Browse Catergory</h5>
							<a href="shop-categories.html" class="btn btn-dark ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="browse-category owl-carousel owl-theme">
								@foreach($category as $categoryRow)
								<div class="item">
									<div class="card rounded-0 product-card border">
										<div class="card-body">
											<img src="{{url('uploads/category/'.$categoryRow->image)}}" class="img-fluid" alt="{{$categoryRow->category}}">
										</div>
										<div class="card-footer text-center">
											<h6 class="mb-1 text-uppercase">{{$categoryRow->category}}</h6>
											<!-- <p class="mb-0 font-12 text-uppercase">10 Products</p> -->
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</section>
				<!--end categories-->

				<!-- Brand -->
				<section class="py-4">
					<div class="container">
						<h4>Our Top Brands</h4>
						<hr>
						<div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5 g-4">
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/01.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/02.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/03.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/04.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/05.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/06.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/07.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/08.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/09.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/10.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/11.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/12.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/13.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/14.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card border shadow-none">
									<div class="card-body">
										<a href="javscript:;">
											<img src="frontend/images/brands/15.png" class="img-fluid" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Brand -->


				<!--start support info-->
				<section class="py-4 bg-light">
					<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-cart'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
									<p class="text-capitalize">Free delivery over $199</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-credit-card'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
									<p class="text-capitalize">We possess SSL / Secure сertificate</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-dollar-circle'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
									<p class="text-capitalize">We return money within 30 days</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-support'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
									<p class="text-capitalize">Friendly 24/7 customer support</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end support info-->


				<!--start bottom products section-->
				<section class="py-4 border-top">
					<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
							<div class="col">
								<div class="bestseller-list mb-3">
									<h6 class="mb-3 text-uppercase">Best Selling Products</h6>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/01.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/02.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/03.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/04.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="featured-list mb-3">
									<h6 class="mb-3 text-uppercase">Featured Products</h6>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/05.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/06.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/07.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/08.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="new-arrivals-list mb-3">
									<h6 class="mb-3 text-uppercase">New arrivals</h6>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="jproduct-details.html">
												<img src="{{url('frontend/images/products/09.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/10.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/11.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/12.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="top-rated-products-list mb-3">
									<h6 class="mb-3 text-uppercase">Top rated Products</h6>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/13.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/14.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/15.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
									<hr/>
									<div class="d-flex align-items-center">
										<div class="bottom-product-img">
											<a href="product-details.html">
												<img src="{{url('frontend/images/products/16.png')}}" width="100" alt="">
											</a>
										</div>
										<div class="ms-0">
											<h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
											<div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
												<i class="bx bxs-star text-warning"></i>
											</div>
											<p class="mb-0"><strong>$59.00</strong>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end bottom products section-->
			</div>
		</div>
		<!--end page wrapper -->

		<!--start footer section-->
		@include('frontend/layouts/footer')
		<!--end footer section-->


		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<script src="{{url('frontend/js/index.js')}}"></script>
	@include('frontend/common')
</body>

</html>