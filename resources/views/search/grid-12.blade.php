@foreach ( $results as $type )

<div class="col-sm-12">
	<a href="{{ route($type->type . '.show', ['id' => $type->id, 'slug' =>$type->slug])}}">
		<div class="row box-shadow btlr btrr bbrr bblr">
			<div class="col-sm-4 col-xs-4">
				<div class="row">
					<img
						@if ( $type->type == 'mp4')
						src="{{ $type->image }}"
						@else
						data-original="{{ TKPM::asset($type->image, 'thumbs') }}"
						@endif
				  		alt="{{ $type->name }}"
						class="img-responsive small-square lazy">
				</div>
			</div>
			<div class="col-sm-8 col-xs-8 right">
				<h4 class="mTop6">
					@if ( $type->price == 'paid')
					<i class="fa fa-money"></i>
					@endif
					{{ $type->name }}
				</h4>
				<p class="text-muted">
		    		<i class="fa fa-eye"></i> Afichaj:
		    		{{ $type->views }} <br>
		    		<i class="fa fa-download"></i> Telechajman:
		    		{{ $type->download }}
		    	</p>
			</div>
		</div>
	</a>
</div>
@endforeach