@php
	$wishlist = App\Models\Wishlist::where('user_id',@Auth::user()->id)->count();
	if(Auth::user()){
		$cartcount = App\Models\Cart::where('user_id',Auth::user()->id)->count();
	}else{
		$cartcount = Session::get('proid') ? count(Session::get('proid')) : 0;
	}

@endphp
<div class="discount-alert d-none d-lg-block">
	<div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
		<div class="d-lg-flex align-items-center gap-2 justify-content-center">
			<p class="mb-0">Get Up to <strong>40% OFF</strong> New-Season Styles</p>
		    <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Men</a>
			<a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Women</a>
			<p class="mb-0 font-13">*Limited time only</p>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
</div>
<!--start top header wrapper-->
<div class="header-wrapper">
	<div class="top-menu border-bottom">
		<div class="container">
			<nav class="navbar navbar-expand">
				<div class="shiping-title text-uppercase font-13 d-none d-sm-flex">
					Welcome &nbsp;&nbsp; <a href="#"><b>{{ Auth::user() ? Auth::user()->name : 'Guest' }}</b></a>
				</div>
				<ul class="navbar-nav ms-auto d-none d-lg-flex">
					<li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track Order</a>
					</li>
					<li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>
					</li>
					<li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Stores</a>
					</li>
					<li class="nav-item"> <a class="nav-link" href="blog.html">Blog</a>
					</li>
					<li class="nav-item">	<a class="nav-link" href="contact-us.html">Contact</a>
					</li>
					<li class="nav-item">	<a class="nav-link" href="javascript:;">Help & FAQs</a>
					</li>
				</ul>

				<ul class="navbar-nav social-link ms-lg-2 ms-auto">
					<li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-facebook'></i></a>
					</li>
					<li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-twitter'></i></a>
					</li>
					<li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-linkedin'></i></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="header-content pb-3 pb-md-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-4 col-md-auto">
					<div class="d-flex align-items-center">
						<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
						</div>
						<div class="logo d-none d-lg-flex">
							<a href="{{route('home')}}">
								<img src="{{url('frontend/images/logo-icon.png')}}" class="logo-icon" alt="Ecommerce" />
							</a>
						</div>
					</div>
				</div>
				<div class="col col-md order-4 order-md-2">
					<div class="input-group flex-nowrap px-xl-4">
						<input type="text" class="form-control w-100" placeholder="Search for Products">
						<select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;">
							<option selected>All Categories</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>	<span class="input-group-text cursor-pointer bg-transparent"><i class='bx bx-search'></i></span>
					</div>
				</div>
				<div class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
					<div class="fs-1 text-white"><i class='bx bx-headphone'></i>
					</div>
					<div class="ms-2">
						<p class="mb-0 font-13">CALL US NOW</p>
						<h5 class="mb-0">+011 5827918</h5>
					</div>
				</div>
				<div class="col-4 col-md-auto order-2 order-md-4">
					<div class="top-cart-icons float-end">
						<nav class="navbar navbar-expand">
							<ul class="navbar-nav ms-auto">
								<li class="nav-item">
									<a href="{{route('user.dashboard')}}" class="nav-link cart-link">
										<i class='bx bx-user'></i>
								</a>
								</li>
								<li class="nav-item">
									<a href="{{route('user.wishlist')}}" class="nav-link position-relative cart-link">
										<span class="alert-count wishcount">{{$wishlist}}</span>
										<i class='bx bx-heart'></i>
									</a>
								</li>
								<!-- cart -->
								<li class="nav-item dropdown dropdown-large" onclick="viewCart()">
									<a href="#" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown">	<span class="alert-count cartcount">{{$cartcount}}</span>
										<i class='bx bx-shopping-bag'></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<div class="minicart"></div>
									</div>
								</li>
								<!-- cart -->
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
	<div class="primary-menu border-top">
		<div class="container">
			<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
				<div class="offcanvas-header">
					<button class="btn-close float-end"></button>
					<h5 class="py-2">Navigation</h5>
				</div>
				<ul class="navbar-nav">
					<li class="nav-item active"> <a class="nav-link" href="{{route('home')}}">Home </a></li>
					<li class="nav-item"> <a class="nav-link" href="{{route('aboutus')}}">About Us</a></li>
					<li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
						Categories  <i class='bx bx-chevron-down'></i></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Category1 <i class='bx bx-chevron-right float-end'></i></a>
								<ul class="submenu dropdown-menu">
									<li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Subcategory1</a></li>
									<li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Subcategory2</a></li>
									<li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Subcategory3</a></li>
								</ul>
							</li>

							<li><a class="dropdown-item" href="about-us.html">Category2</a>
							</li>

						</ul>
					</li>
					<li class="nav-item"> <a class="nav-link" href="{{route('shop')}}">Shop</a></li>
					<li class="nav-item"> <a class="nav-link" href="{{route('contactus')}}">Contact Us</a></li>
					@if(Auth::user())
					<li class="nav-item"> <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a></li>
					<li class="nav-item"> <a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
					@else
					<li class="nav-item"> <a class="nav-link" href="{{route('signin')}}">Sign In</a></li>
					<li class="nav-item"> <a class="nav-link" href="{{route('signup')}}">Sign Up</a></li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
</div>
<!--end top header wrapper-->