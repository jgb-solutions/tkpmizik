<div class="list-group">
  	<a href="{{ route('video') }}" class="list-group-item bg-black">
    	<h4 class="white"><i class="fa fa-video-camera"></i> Videyo Resan</h4>
  	</a>

	@if (count($videos))
		<ul class="list-unstyled">
			@foreach($videos as $video)
				<strong>
					<a class="list-group-item" href="{{ route('video.show', ['id' => $video->id, 'slug' => $video->slug]) }}">
						<i class="fa fa-video-camera"></i> {{ $video->name }}
					</a>
				</strong>
			@endforeach
		</ul>
	@endif
</div>