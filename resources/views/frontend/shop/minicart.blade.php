<div class="minicart">
	<a href="{{route('cart')}}">
		<div class="cart-header">
			<p class="cart-header-title mb-0">{{count($cart)}} ITEMS</p>
			<p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
		</div>
	</a>
	<div class="cart-list">
		@php $total = 0; @endphp
		@foreach($cart as $cartRow)
		<div class="dropdown-item mincart-{{$cartRow->id}}">
			<div class="d-flex align-items-center">
				<div class="flex-grow-1">
					<a href="{{route('product.details',$cartRow->url)}}">
						<h6 class="cart-product-title">{{$cartRow->product}}</h6>
						<p class="cart-product-price">₹ {{$cartRow->price}} X {{$cartRow->quantity}}</p>
					</a>
				</div>
				<div class="position-relative">
					<div class="cart-product-cancel position-absolute" onclick="removeminiCartPro({{$cartRow->id}})"><i class='bx bx-x'></i>
					</div>
					<div class="cart-product">
						<img src="{{url('uploads/product/'.$cartRow->image)}}" class="" alt="product image">
					</div>
				</div>
			</div>
		</div>
		@php $total = $total + ($cartRow->price * $cartRow->quantity) @endphp
		@endforeach
	</div>
	<a href="javascript:;">
		<div class="text-center cart-footer d-flex align-items-center">
			<h5 class="mb-0">TOTAL</h5>
			<h5 class="mb-0 ms-auto">₹ {{number_format($total,2)}}</h5>
		</div>
	</a>
	<div class="d-grid p-3 border-top">	<a href="{{route('checkout')}}" class="btn btn-dark btn-ecomm">CHECKOUT</a>
	</div>
</div>