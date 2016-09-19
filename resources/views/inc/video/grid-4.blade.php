<div class="col-sm-3 col-xs-6">
	<div class="thumbnail noPadding4 maxHeight228">
		<a href="{{ $video->url }}">
		  	<img
				class="img-reponsive full-width"
				alt="{{ $video->name }}"
				src="{{ $video->imageUrl }}">
		</a>
	  	<div class="text-center">
		   <h5 class="oneLiner">
		    	<a href="{{ $video->url }}" class="black">
		    		{{ $video->name }}
		    	</a>
		   </h5>
		   <p class="text-muted">
	    		<i class="fa fa-eye"></i> Afichaj:
	    		{{ $video->views }} <br>
	    		<i class="fa fa-download"></i> Telechajman:
	    		{{ $video->download }}
	    	</p>
	  	</div>
	</div>
</div>