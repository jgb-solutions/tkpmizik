<div class="col-sm-12">
	@include('inc.ads.bottom')

	@if(count($featuredVideos))
		<div class="row bg-black">
			<h3 class="text-center text-uppercase">
				<i class="fa fa-video-camera"></i> Videyo Rek&ograve;mande
			</h3>
		</div>
		<br>

		<div class="row">
			@foreach ($featuredVideos as $video)
				@include('inc.video.grid-4')
			@endforeach
		</div>
	@endif

</div>