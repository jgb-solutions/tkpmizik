<div class="list-group">
  	<a class="list-group-item bg-black">
    	<h4 class="white">
    		<i class="fa fa-music"></i> Tòp Mizik Mwa a
    	</h4>
  	</a>

	@if (count($musics) )
		@foreach($musics as $music)
		<strong>
			<a class="list-group-item" href="{{ $music->url }}">
				<span class="badge">
					{{ $music->play }}
					<i class="fa fa-play"></i>
					-
					{{ $music->download }}
					<i class="fa fa-download"></i>
					-
					{{ $music->vote_up }}
					<i class="fa fa-thumbs-up"></i>

				</span>
				{{ $music->name }}
			</a>
		</strong>
		@endforeach
	@endif
</div>