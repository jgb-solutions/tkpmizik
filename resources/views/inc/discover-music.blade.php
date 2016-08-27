@foreach ($musics as $music)
	<div class="col-sm-3">
		<div class="thumbnail noPadding4 maxHeight228 black">
			<a href="{{ route('music.show', [
		    		'id' => $music->id,
		    		'slug' => $music->slug ]) }}">
			  	<img
					class="img-reponsive full-width lazy"
					alt="{{ $music->name }}"
					data-original="{{ TKPM::asset($music->image, 'thumbs') }}">
			</a>
		  	<div class="caption text-center">
		    	<h5>
			    	<a href="{{ route('music.show', [
			    		'id' => $music->id,
			    		'slug' => $music->slug ]) }}">{{ $music->name }}</a></h5>
		  	</div>
		</div>
	</div>
@endforeach