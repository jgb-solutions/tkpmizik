<div class="col-sm-12">
	@if(count($featuredMusics))

	<div class="row bg-black">
		<h3 class="text-center text-uppercase">
			<i class="fa fa-music"></i>
			Mizik Rek&ograve;mande
		</h3>
	</div>

	<br>

	<div class="row">
		@foreach ($featuredMusics as $music)
			@include('inc.music.grid-4')
		@endforeach
	</div>
	@endif
</div>