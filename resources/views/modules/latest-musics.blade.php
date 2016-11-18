<div class="list-group">
  	<a href="{{ route('music') }}" class="list-group-item bg-black">
    	<h4 class="white"><i class="fa fa-music"></i> Mizik Resan</h4>
  	</a>

	@if (count($musics))
		<ul class="list-unstyled">
			@foreach( $musics as $music )
				<strong>
					<a class="list-group-item" href="{{ $music->url }}">
						<i class="fa fa-music"></i> {{ $music->name }}
					</a>
				</strong>
			@endforeach
		</ul>
	@endif
</div>