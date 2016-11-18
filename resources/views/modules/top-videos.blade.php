<div class="list-group">
  	<a class="list-group-item bg-black">
    	<h4 class="white">
    		<i class="fa fa-video-camera"></i> Videyo Plis Telechaje
    	</h4>
  	</a>

	@if (count($videos))
		@foreach($videos as $video)
		<strong>
			<a class="list-group-item" href="{{ $video->imageUrl }}">
				<span class="badge">
						{{ $video->views }}
						<i class="fa fa-eye"></i>
						&nbsp;
						{{ $video->download }}
						<i class="fa fa-download"></i>
						{{-- -
						{{ $video->vote_up }}
						<i class="fa fa-thumbs-up"></i> --}}
					</span>
				{{ $video->name }}
			</a>
		</strong>
		@endforeach
	@endif
</div>