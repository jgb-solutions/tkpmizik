<div class="col-sm-4 col-xs-6">
	<div class="thumbnail noPadding4 maxHeight228 btlr btrr bbrr bblr"
		title="{{$type->title}}">
		<a href="{{ $type->url }}" class="fakecrop-fill">
			  	<img
					class="img-reponsive full-width"
					alt="{{ $type->name }}"
					src="{{ $type == 'music' ? TKPM::asset($type->image, 'thumbs') : $type->imageUrl }}">
		</a>
		<div class="text-center">
		  	<h5 class="oneLiner">
		  		<a href="{{ $type->url }}" class="black">
					{{ $type->name }}
			   </a>
			</h5>
			<p class="text-muted oneLiner">
		    		<i class="fa fa-eye oneLiner"></i> Afichaj:
		    		{{ $type->views }} <br>
		    		<i class="fa fa-download oneLiner"></i> Telechajman:
		    		{{ $type->download }}
		    	</p>
		</div>
	</div>
</div>