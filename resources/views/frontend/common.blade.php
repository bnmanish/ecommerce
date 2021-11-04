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
<script>
	setTimeout(function(){
		$('.alermsg').hide();
	},5000);
</script>