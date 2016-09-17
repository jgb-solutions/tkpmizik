<div class="row">
	<div class="col-xs-7">
		@if(Auth::check())
		  	@if(Auth::user()->ownerOrAdmin($obj))
				<form action="{{ TKPM::route($route.'.delete', $obj->id) }}" method="POST" role="form">
					<a class="btn btn-lg btn-default"
						href="{{ TKPM::route($route.'.edit', $obj->id) }}">
						<i class="fa fa-edit"></i>
		  				<span>Modifye</span>
					</a>
					<hr class="visible-xs">
					<button onclick='return confirm("Ou Vle Efase {{ $obj->name }} tout bon?")'
						class="btn btn-lg btn-danger">
						<i class="fa fa-trash-o"></i>
						<span>Efase</span>
					</button>
					<hr class="visible-xs">

					{{ csrf_field() }}
					{{ method_field('DELETE') }}
				</form>
			@endif
		@endif
	</div>
	<div class="col-xs-5 text-right">
		@if($route !== 'playlist')
			@if (Auth::check() && $route == 'music')
				<div class="btn-group btn-group-lg" id="vote-btn">
					{{-- {!! TKPM::vote($class, $obj->id, $obj->vote_up, $obj->vote_down) !!} --}}

					@if ($route ==  'music')
						<a class="btn btn-lg btn-success"
							title="Ajoute mizik sa a nan lis mizik ou"
							data-toggle="modal" href='#ajoute-mizik'>
							<i class="fa fa-list"></i>
							<i class="fa fa-plus"></i>
						</a>

						@include('inc.playlist-modal')
					@endif
				</div>
			@else
				<div><br><br></div>
			@endif
			<br>
		@endif
	</div>
</div>


@if ($route !== 'playlist')
	  	<a class="btn btn-lg btn-success downloadButton"
	  		href="{{ TKPM::route($route.'.get', $obj->id)}}"
	  		target="_blank">
	  		<i class="fa fa-download"></i>
	  		<span>Telechaje</span>
	  	</a>
@endif