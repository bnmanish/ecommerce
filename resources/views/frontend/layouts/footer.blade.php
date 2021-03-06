@php
	
	
	$setting = App\Models\WebisteSetting::first();


@endphp
<footer>
	<section class="py-4 border-top bg-light">
		<div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
				<div class="col">
					<div class="footer-section1 mb-3">
						<h6 class="mb-3 text-uppercase">Contact Info</h6>
						<div class="address mb-3">
							<p class="mb-0 text-uppercase">Address</p>
							<p class="mb-0 font-12">{{$setting->address}}</p>
						</div>
						<div class="phone mb-3">
							<p class="mb-0 text-uppercase">Phone</p>
							<p class="mb-0 font-13"><a href='tel:{{$setting->contact1}}'>Mobile : {{$setting->contact1}}</a></p>
							{{--<p class="mb-0 font-13">Mobile : {{$setting->contact2}}</p>--}}
						</div>
						<div class="email mb-3">
							<p class="mb-0 text-uppercase">Email</p>
							<p class="mb-0 font-13"><a href="mailto:{{$setting->email1}}"> {{$setting->email1}}</a></p>
							<p class="mb-0 font-13"><a href="mailto:{{$setting->email2}}"> {{$setting->email2}}</a></p>
						</div>
						<!-- <div class="working-days mb-3">
							<p class="mb-0 text-uppercase">WORKING DAYS</p>
							<p class="mb-0 font-13">Mon - FRI / 9:30 AM - 6:30 PM</p>
						</div> -->
					</div>
				</div>
				<div class="col">
					<div class="footer-section2 mb-3">
						<h6 class="mb-3 text-uppercase">Shop Categories</h6>
						<ul class="list-unstyled">
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Jeans</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> T-Shirts</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sports</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Shirts & Tops</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Clogs & Mules</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sunglasses</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Bags & Wallets</a>
							</li>
							<!-- <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sneakers & Athletic</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Electronis</a>
							</li>
							<li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Furniture</a>
							</li> -->
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="footer-section3 mb-3">
						<h6 class="mb-3 text-uppercase">Popular Tags</h6>
						<div class="tags-box"> <a href="javascript:;" class="tag-link">Cloths</a>
							<a href="javascript:;" class="tag-link">Electronis</a>
							<a href="javascript:;" class="tag-link">Furniture</a>
							<a href="javascript:;" class="tag-link">Sports</a>
							<a href="javascript:;" class="tag-link">Men Wear</a>
							<a href="javascript:;" class="tag-link">Women Wear</a>
							<a href="javascript:;" class="tag-link">Laptops</a>
							<a href="javascript:;" class="tag-link">Formal Shirts</a>
							<a href="javascript:;" class="tag-link">Topwear</a>
							<a href="javascript:;" class="tag-link">Headphones</a>
							<a href="javascript:;" class="tag-link">Bottom Wear</a>
							<a href="javascript:;" class="tag-link">Bags</a>
							<a href="javascript:;" class="tag-link">Sofa</a>
							<a href="javascript:;" class="tag-link">Shoes</a>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="footer-section4 mb-3">
						<h6 class="mb-3 text-uppercase">Stay informed</h6>
						<div class="subscribe">
							<input type="text" class="form-control radius-30" placeholder="Enter Your Email" />
							<div class="mt-2 d-grid">	<a href="javascript:;" class="btn btn-dark btn-ecomm radius-30">Subscribe</a>
							</div>
							<p class="mt-2 mb-0 font-13">Subscribe to our newsletter for exclusive offer!</p>
						</div>
						<div class="download-app mt-3">
							<h6 class="mb-3 text-uppercase">Download our app</h6>
							<div class="d-flex align-items-center gap-2">
								<a href="javascript:;">
									<img src="{{url('frontend/images/icons/apple-store.png')}}" class="" width="160" alt="" />
								</a>
								<a href="javascript:;">
									<img src="{{url('frontend/images/icons/play-store.png')}}" class="" width="160" alt="" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
			<hr/>
			<div class="row row-cols-1 row-cols-md-2 align-items-center">
				<div class="col">
					<p class="mb-0">{{$setting->copyright}}</p>
				</div>
				<div class="col text-end">
					<div class="payment-icon">
						<div class="row row-cols-auto g-2 justify-content-end">
							<div class="col">
								<img src="{{url('frontend/images/icons/visa.png')}}" alt="" />
							</div>
							<div class="col">
								<img src="{{url('frontend/images/icons/paypal.png')}}" alt="" />
							</div>
							<div class="col">
								<img src="{{url('frontend/images/icons/mastercard.png')}}" alt="" />
							</div>
							<div class="col">
								<img src="{{url('frontend/images/icons/american-express.png')}}" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</section>
</footer>

<!--Start Back To Top Button--> 
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->