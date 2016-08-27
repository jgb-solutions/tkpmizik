<div class="col-sm-12">
	@if($lastMonthTopMusics->count())
		<div class="row bg-black">
			<h3 class="text-center text-uppercase">
				<i class="fa fa-music"></i>
				T&ograve;p Mizik depi 30 jou
			</h3>
		</div>

		<br>

		<div class="row">
			@foreach ($lastMonthTopMusics as $music )
			<div class="col-sm-3 col-xs-6">
					<div class="thumbnail noPadding4 maxHeight228">
						<a href="{{ route('music.show', ['id' => $music->id,'name' => $music->slug ]) }}">
						  	<img
								class="img-reponsive full-width lazy"
								alt="{{ $music->name }}"
								data-original="{{ TKPM::asset($music->image, 'thumbs') }}">
						</a>
					  	<div class="text-center">
						    	<h5>
						    		<a href="{{ route('music.show', ['id' => $music->id,'name' => $music->slug ]) }}" class="black">
						    			{{ $music->name }}
						    		</a>
						    	</h5>
					  	</div>
					</div>
				</div>
			@endforeach
		</div>
	@endif
	{{-- <br/> --}}
</div>