@foreach ( $musics as $music )

<div class="col-sm-4 col-xs-6">
	<div class="thumbnail noPadding4 maxHeight228 box-shadow btlr btrr bbrr bblr"
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
		    		<i class="fa fa-eye"></i> Afichaj:
		    		{{ $music->views }} <br>
		    		@if( $music->price == 'free')
		    		<i class="fa fa-headphones"></i> Ekout:
		    		{{ $music->play }} <br>
		    		@endif
		    		<i class="fa fa-download"></i> Telechajman:
		    		{{ $music->download }}
		    	</p>
		</div>
	</div>
</div>
{{-- <div class="col-sm-6">
	<a href="{{ $music->url }}" class="fakecrop-fill img">
		<div class="row box-shadow btlr btrr bbrr bblr bg-white">
			<div class="col-sm-4 col-xs-4">
				<div class="row">
					<img
				  		alt="{{ $music->name }}"
						class="img-responsive"
						src="{{ TKPM::asset($music->image, 'thumbs') }}">
				</div>
			</div>
			<div class="col-sm-8 col-xs-8 right">
				<h4 class="mTop6">
					{{ $music->name }}
					@if ( $music->price == 'paid')
					- <i class="fa fa-dollar"></i>
					@endif
				</h4>
				<p class="text-muted">
		    		<i class="fa fa-eye"></i> Afichaj:
		    		{{ $music->views }} <br>
		    		@if( $music->price == 'free')
		    		<i class="fa fa-headphones"></i> Ekout:
		    		{{ $music->play }} <br>
		    		@endif
		    		<i class="fa fa-download"></i> Telechajman:
		    		{{ $music->download }}
		    	</p>
			</div>
		</div>
	</a>
</div> --}}
@endforeach