@foreach ( $users as $user )

<div class="col-sm-12">
	<a href="/user/{{ $user->id }}">
		<div class="row box-shadow">
			<div class="col-sm-4 col-xs-4">
				<div class="row">
					<img
				  		alt="{{ $user->name }}"
						class="img-responsive small-square lazy"
						data-original="{{ TKPM::asset($user->image, 'thumbs') }}">
				</div>
			</div>
			<div class="col-sm-8 col-xs-8 right">
				<h4 class="mTop6">
					{{ $user->name }}
					@if ( $user->price == 'paid')
					- <i class="fa fa-dollar"></i>
					@endif
				</h4>
				<p class="text-muted">
		    		<i class="fa fa-eye"></i> Afichaj:
		    		{{ $user->views }} <br>
		    		@if( $user->price == 'free')
		    		<i class="fa fa-headphones"></i> Ekout:
		    		{{ $user->play }} <br>
		    		@endif
		    		<i class="fa fa-download"></i> Telechajman:
		    		{{ $user->download }}
		    	</p>
			</div>
		</div>
	</a>
</div>
@endforeach