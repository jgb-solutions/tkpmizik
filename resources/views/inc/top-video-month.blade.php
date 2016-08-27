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
			<div class="col-sm-3 col-xs-6">
				<div class="thumbnail noPadding4 maxHeight228">
					<a href="{{ route('video.show', [
					    		'id' => $video->id,
					    		'name' => $video->slug ]) }}">
					  	<img
							class="img-reponsive full-width lazy"
							alt="{{ $video->name }}"
							data-original="{{ $video->image }}">
					</a>
				  	<div class="text-center">
					    	<h5>
					    		<a href="{{ route('video.show', ['id' => $video->id,'name' => $video->slug ]) }}" class="black">
					    			{{ $video->name }}
					    		</a>
					    	</h5>
				  	</div>
				</div>
			</div>
		@endforeach

	</div>
	@endif

</div>