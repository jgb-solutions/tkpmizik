@foreach ( $videos as $video )
<div class="col-sm-4 col-xs-6">
	<div class="thumbnail noPadding4 maxHeight228 box-shadow btlr btrr bbrr bblr"
		title="{{$video->title}}">
		<a href="{{ $video->url }}" class="fakecrop-fill">
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
{{-- <div class="col-sm-12">
	<a href="{{ $video->url }}">

		<div class="row box-shadow btlr btrr bbrr bblr bg-white">
			<div class="col-sm-4 col-xs-4">
				<div class="row">
					<img
				  		alt="{{ $video->name }}"
						class="img-responsive small-square lazy"
						data-original="{{ $video->imageUrl }}">
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
</div> --}}
@endforeach