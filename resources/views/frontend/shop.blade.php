<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
							<h3 class="breadcrumb-title pe-3">Shop Grid Left Sidebar</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Shop Left Sidebar</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop area-->
				<section class="py-4">
					<div class="container">
						<div class="row">
							<div class="col-12 col-xl-3">
								<div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
								</div>
								<div class="filter-sidebar d-none d-xl-flex">
									<div class="card rounded-0 w-100">
										<div class="card-body">
											<div class="align-items-center d-flex d-xl-none">
												<h6 class="text-uppercase mb-0">Filter</h6>
												<div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
											</div>
											<hr class="d-flex d-xl-none" />
											<div class="product-categories">
												<h6 class="text-uppercase mb-3">Categories</h6>
												<ul class="list-unstyled mb-0 categories-list">
													<li><a href="javascript:;">Clothings <span class="float-end badge rounded-pill bg-primary">42</span></a>
													</li>
													<li><a href="javascript:;">Sunglasses <span class="float-end badge rounded-pill bg-primary">32</span></a>
													</li>
													<li><a href="javascript:;">Bags <span class="float-end badge rounded-pill bg-primary">17</span></a>
													</li>
													<li><a href="javascript:;">Watches <span class="float-end badge rounded-pill bg-primary">217</span></a>
													</li>
													<li><a href="javascript:;">Furniture <span class="float-end badge rounded-pill bg-primary">28</span></a>
													</li>
													<li><a href="javascript:;">Shoes <span class="float-end badge rounded-pill bg-primary">145</span></a>
													</li>
													<li><a href="javascript:;">Accessories <span class="float-end badge rounded-pill bg-primary">15</span></a>
													</li>
													<li><a href="javascript:;">Headphones <span class="float-end badge rounded-pill bg-primary">8</span></a>
													</li>
												</ul>
											</div>
											<hr>
											<div class="price-range">
												<h6 class="text-uppercase mb-3">Price</h6>
												<div class="my-4" id="slider"></div>
												<div class="d-flex align-items-center">
													<button type="button" class="btn btn-dark btn-sm text-uppercase rounded-0 font-13 fw-500">Filter</button>
													<div class="ms-auto">
														<p class="mb-0">Price: $200.00 - $900.00</p>
													</div>
												</div>
											</div>
											<hr>
											<div class="size-range">
												<h6 class="text-uppercase mb-3">Size</h6>
												<ul class="list-unstyled mb-0 categories-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Small">
															<label class="form-check-label" for="Small">Small</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Medium">
															<label class="form-check-label" for="Medium">Medium</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Large">
															<label class="form-check-label" for="Large">Large</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="ExtraLarge">
															<label class="form-check-label" for="ExtraLarge">Extra Large</label>
														</div>
													</li>
												</ul>
											</div>
											<hr>
											<div class="product-brands">
												<h6 class="text-uppercase mb-3">Brands</h6>
												<ul class="list-unstyled mb-0 categories-list">
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Adidas">
															<label class="form-check-label" for="Adidas">Adidas (15)</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Armani">
															<label class="form-check-label" for="Armani">Armani (26)</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="CalvinKlein">
															<label class="form-check-label" for="CalvinKlein">Calvin Klein (24)</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Columbia">
															<label class="form-check-label" for="Columbia">Columbia (38)</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="JhonPlayers">
															<label class="form-check-label" for="JhonPlayers">Jhon Players (48)</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" value="" id="Diesel">
															<label class="form-check-label" for="Diesel">Diesel (64)</label>
														</div>
													</li>
												</ul>
											</div>
											<hr>
											<div class="product-colors">
												<h6 class="text-uppercase mb-3">Colors</h6>
												<ul class="list-unstyled mb-0 categories-list">
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-black"></div>
															<p class="mb-0 ms-3">Black</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-warning"></div>
															<p class="mb-0 ms-3">Yellow</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-danger"></div>
															<p class="mb-0 ms-3">Red</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-primary"></div>
															<p class="mb-0 ms-3">Blue</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-white"></div>
															<p class="mb-0 ms-3">White</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-success"></div>
															<p class="mb-0 ms-3">Green</p>
														</div>
													</li>
													<li>
														<div class="d-flex align-items-center cursor-pointer">
															<div class="color-indigator bg-info"></div>
															<p class="mb-0 ms-3">Sky Blue</p>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-xl-9">
								<div class="product-wrapper">
									<div class="toolbox d-flex align-items-center mb-3 gap-2">
										<div class="d-flex flex-wrap flex-grow-1 gap-1">
											<div class="d-flex align-items-center flex-nowrap">
												<p class="mb-0 font-13 text-nowrap">Sort By:</p>
												<select class="form-select ms-3 rounded-0">
													<option value="menu_order" selected="selected">Default sorting</option>
													<option value="popularity">Sort by popularity</option>
													<option value="rating">Sort by average rating</option>
													<option value="date">Sort by newness</option>
													<option value="price">Sort by price: low to high</option>
													<option value="price-desc">Sort by price: high to low</option>
												</select>
											</div>
										</div>
										<div class="d-flex flex-wrap">
											<div class="d-flex align-items-center flex-nowrap">
												<p class="mb-0 font-13 text-nowrap">Show:</p>
												<select class="form-select ms-3 rounded-0">
													<option>9</option>
													<option>12</option>
													<option>16</option>
													<option>20</option>
													<option>50</option>
													<option>100</option>
												</select>
											</div>
										</div>
										<div>	<a href="shop-grid-left-sidebar.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
										</div>
										<div>	<a href="shop-list-left-sidebar.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
										</div>
									</div>
									<div class="product-grid">
										<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/01.png')}}" class="card-img-top" alt="...">
													<div class="card-body">
														<div class="product-info">
															<a href="javascript:;">
																<p class="product-catergory font-13 mb-1">Catergory Name</p>
															</a>
															<a href="javascript:;">
																<h6 class="product-name mb-2">Product Short Name</h6>
															</a>
															<div class="d-flex align-items-center">
																<div class="mb-1 product-price">	<span class="me-1 text-decoration-line-through">$99.00</span>
																	<span class="fs-5">$49.00</span>
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
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/02.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-light-4"></i>
																	<i class="bx bxs-star text-light-4"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/03.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-light-4"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/04.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/05.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-light-4"></i>
																	<i class="bx bxs-star text-light-4"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/06.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/07.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-light-4"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/08.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card rounded-0 product-card">
													<div class="card-header bg-transparent border-bottom-0">
														<div class="d-flex align-items-center justify-content-end gap-3">
															<a href="javascript:;">
																<div class="product-compare"><span><i class="bx bx-git-compare"></i> Compare</span>
																</div>
															</a>
															<a href="javascript:;">
																<div class="product-wishlist"> <i class="bx bx-heart"></i>
																</div>
															</a>
														</div>
													</div>
													<img src="{{url('frontend/images/products/09.png')}}" class="card-img-top" alt="...">
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
																	<span class="fs-5">$49.00</span>
																</div>
																<div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																	<i class="bx bxs-star text-warning"></i>
																</div>
															</div>
															<div class="product-action mt-2">
																<div class="d-grid gap-2">
																	<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>
																	<a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class="bx bx-zoom-in"></i>Quick View</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end row-->
									</div>
									<hr>
									<nav class="d-flex justify-content-between" aria-label="Page navigation">
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
											</li>
											<li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
											</li>
										</ul>
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end shop area-->
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
				<div class="modal-content rounded-0 border-0">
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
										<a href="javascript:;" class="btn btn-dark btn-ecomm">	<i class="bx bxs-cart-add"></i>Add to Cart</a>	<a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Add to Wishlist</a>
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
	<script src="{{url('frontend/plugins/nouislider/nouislider.min.js')}}"></script>
	<script src="{{url('frontend/js/price-slider.js')}}"></script>
	<script src="{{url('frontend/js/product-gallery.js')}}"></script>
	<!--app JS-->
	<script src="{{url('frontend/js/app.js')}}"></script>
</body>

</html>