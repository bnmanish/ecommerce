@if(Session::has('success'))
<div class="bg-success alermsg" id="success-alert">
	<p class="p-3 m-0 text-white"><?=Session::get('success');?></p>
</div>
@endif
@if(Session::has('error'))
<div class="bg-danger alermsg" id="danger-alert">
	<p class="p-3 m-0 text-white"><?=Session::get('error');?></p>
</div>
@endif

<div class="bg-success alermsg ajaxmsg" id="success-alert">
	<p class="p-3 m-0 text-white ajaxmsgtxt"></p>
</div>

<script>

	$('.ajaxmsg').hide();

	function addWishlist(id){
		$.ajax({
			url:"{{route('add.wishlist')}}",
			type: "POST",
			data: {id:id,_token:"{{ csrf_token() }}"},
			success: function(response){
				if(response.status == true){
					$( ".prowish-"+id ).addClass( "bg-danger text-white" );
					$('.prowishdet-'+id).html("<i class='bx bx-heart'></i> Remove From Wishlist").addClass('btn-danger').removeClass('btn-dark');
					$('.wishcount').html(response.count);
					$('.ajaxmsgtxt').html(response.message);
					$('.ajaxmsg').show();
					setTimeout(function(){
						$('.alermsg').hide();
					},5000);
				}else{
					$( ".prowish-"+id ).removeClass( "bg-danger text-white" );
					$('.prowishdet-'+id).html("<i class='bx bx-heart'></i> Add to Wishlist").addClass('btn-dark').removeClass('btn-danger');
					$('.wishcount').html(response.count);
					$('.ajaxmsgtxt').html(response.message);
					$('.ajaxmsg').show();
					setTimeout(function(){
						$('.alermsg').hide();
					},5000);
				}
			}
		});
	}

	function deleteWishlist(id){

		$.ajax({
			url:'{{route('delete.wishlist')}}',
			method:'POST',
			data:{id:id,_token:'{{csrf_token()}}'},
			success:function(response){
				$('.wishpro-'+id).hide();
				$('.ajaxmsgtxt').html(response.message);
				$('.ajaxmsg').show();
				setTimeout(function(){
					$('.alermsg').hide();
				},5000);
			}

		});

	}

	function addCart(id){
		
		$.ajax({
			url: "{{route('add.cart')}}",
			method: "POST",
			data: {id:id,qty:1,_token:"{{ csrf_token() }}"},
			success:function(response){
				console.log(response)
				if(response.status == true){
					$('.procart-'+id).html("<i class='bx bxs-cart-add'></i>Remove From Cart").addClass('btn-danger').removeClass(' btn-dark');
					$('.cartcount').html(response.count);
				}else{
					$('.procart-'+id).html("<i class='bx bxs-cart-add'></i>Add To Cart").addClass('btn-dark').removeClass('btn-danger');
					$('.cartcount').html(response.count);
				}
			}
		});

	}

	setTimeout(function(){
		$('.alermsg').hide();
	},5000);


	function viewCart(){
		$.ajax({
			url: "{{route('view.cart')}}",
			method: "GET",
			success:function(response){
				$('.minicart').replaceWith(response);
			}
		});
	}

	function removeminiCartPro(cartid){
		$.ajax({
			url: "{{route('remove.pro.mini.cart')}}",
			method: "POST",
			data: {cartid:cartid,_token:"{{ csrf_token() }}"},
			success:function(response){
				console.log(response)
				if(response.status == true){
					$('.mincart-'+cartid).hide();
					$('.cartcount').html(response.count);
				}
			}
		});
	}
	


</script>