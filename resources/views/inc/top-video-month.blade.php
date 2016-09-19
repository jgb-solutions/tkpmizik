<div class="col-sm-12">

	@include('inc.ads.bottom')

	@if(count($lastMonthTopVideos))

	<div class="row bg-black">
		<h3 class="text-center text-uppercase">
			<i class="fa fa-video-camera"></i> T&ograve;p Videyo depi 30 jou
		</h3>
	</div>
	<br>

	<div class="row">
		@foreach ($lastMonthTopVideos as $video)
			@include('inc.video.grid-4')
		@endforeach

	</div>
	@endif

</div>