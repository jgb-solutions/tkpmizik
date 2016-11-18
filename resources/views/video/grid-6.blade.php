@foreach ( $mp4s as $mp4 )

<div class="col-sm-6">
	<a href="/mp4/{{ $mp4->id }}">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="row box-shadow">
					<div class="col-sm-4 col-xs-4">
						<div class="row">
							<img
								data-original="{{ $mp4->image }}"
						  		alt="{{ $mp4->name }}"
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
				    		{{ $mp4->views }} <br>
				    		@if( $mp3->price == 'free')
				    		<i class="fa fa-headphones"></i> Ekout:
				    		{{ $mp3->play }} <br>
				    		@endif
				    		<i class="fa fa-download"></i> Telechajman:
				    		{{ $mp4->download }}
				    	</p>
					</div>
				</div>
			</div>
		</div>
	</a>
</div>

@endforeach