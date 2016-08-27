@foreach ($videos as $video)
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
		  	<div class="caption text-center">
			    	<h5>
			    		<a href="{{ route('video.show', [
				    		'id' => $video->id,
				    		'name' => $video->slug ]) }}">{{ $video->name }}
				    	</a>
				</h5>
		  	</div>
		</div>
	</div>
@endforeach