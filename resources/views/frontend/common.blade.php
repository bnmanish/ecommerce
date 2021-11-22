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
				console.log(response)
				if(response.status == true){
					$( "#prowish-"+id ).addClass( "bg-danger text-white" );
					$('.wishcount').html(response.count);
					$('.ajaxmsgtxt').html(response.message);
					$('.ajaxmsg').show();
					setTimeout(function(){
						$('.alermsg').hide();
					},5000);
				}else{
					$( "#prowish-"+id ).removeClass( "bg-danger text-white" );
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

	setTimeout(function(){
		$('.alermsg').hide();
	},5000);


	


</script>