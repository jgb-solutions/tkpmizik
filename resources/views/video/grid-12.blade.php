@foreach ( $videos as $video )

<div class="col-sm-12">
	<a href="{{ route('video.show', [
    		'id' => $video->id,
    		'name' => $video->slug ]) }}">

		<div class="row box-shadow btlr btrr bbrr bblr">
			<div class="col-sm-4 col-xs-4">
				<div class="row">
					<img
				  		alt="{{ $video->name }}"
						class="img-responsive small-square lazy"
						data-original="{{ $video->image }}">
				</div>
			</div>
			<div class="col-sm-8 col-xs-8 right">
				<h4 class="mTop6">
					{{ $video->name }}
				</h4>
				<p class="text-muted">
		    		<i class="fa fa-eye"></i> Afichaj:
		    		{{ $video->views }} <br>
		    		<i class="fa fa-download"></i> Telechajman:
		    		{{ $video->download }}
		    	</p>
			</div>
		</div>

	</a>
</div>
@endforeach