<div class="list-group">
  	<a class="list-group-item bg-black">
    	<h4 class="white">
    		<i class="fa fa-video-camera"></i> Tòp Videyo Mwa a
    	</h4>
  	</a>

	@if (count($videos))
		@foreach($videos as $video)
		<strong>
			<a class="list-group-item" href="{{ $video->url }}">
				<span class="badge">
						{{ $video->views }}
						<i class="fa fa-eye"></i>
						-
						{{ $video->download }}
						<i class="fa fa-download"></i>
						-
						{{ $video->vote_up }}
						<i class="fa fa-thumbs-up"></i>
					</span>
				{{ $video->name }}
			</a>
		</strong>
		@endforeach
	@endif
</div>