<div class="col-sm-4 col-xs-6">
	<div class="thumbnail noPadding4 maxHeight228 btlr btrr bbrr bblr"
		title="{{$music->title}}">
		<a href="{{ $music->url }}" class="fakecrop-fill">
			  	<img
					class="img-reponsive full-width"
					alt="{{ $music->name }}"
					src="{{ TKPM::asset($music->image, 'thumbs') }}">
		</a>
		<div class="text-center">
		  	<h5 class="oneLiner">
		  		<a href="{{ $music->url }}" class="black">
					{{ $music->name }}
			   </a>
			</h5>
			<p class="text-muted">
		    		<i class="fa fa-eye oneLiner"></i> Afichaj:
		    		{{ $music->views }} <br>
		    		<i class="fa fa-download oneLiner"></i> Telechajman:
		    		{{ $music->download }}
		    	</p>
		</div>
	</div>
</div>