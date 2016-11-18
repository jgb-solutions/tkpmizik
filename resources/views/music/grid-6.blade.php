@foreach ( $mp3s as $mp3 )

<div class="col-sm-6">
	<a href="/mp3/{{ $mp3->id }}">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row box-shadow">
					<div class="col-sm-4 col-xs-4">
						<div class="row">
							<img
								data-original="{{ TKPM::asset($mp3->image, 'thumbs') }}"
						  		alt="{{ $mp3->name }}"
								class="img-responsive small-square lazy">
						</div>
					</div>
					<div class="col-sm-8 col-xs-8 right">
						<h4 class="mTop6">
							{{ $mp3->name }}
							@if ( $mp3->price == 'paid')
							- <i class="fa fa-dollar"></i>
							@endif
						</h4>
						<p class="text-muted">
				    		<i class="fa fa-eye"></i> Afichaj:
				    		{{ $mp3->views }} <br>
				    		@if( $mp3->price == 'free')
				    		<i class="fa fa-headphones"></i> Ekout:
				    		{{ $mp3->play }} <br>
				    		@endif
				    		<i class="fa fa-download"></i> Telechajman:
				    		{{ $mp3->download }} <br>

				    		@if ( $mp3->description )
							<span class="visible-xs">
				    			<i class="fa fa-align-justify"></i>
				    			{{ $mp3->description }}
				    		</span>
				    		@endif
				    	</p>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>

@endforeach