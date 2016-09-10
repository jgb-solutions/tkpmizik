<div class="row">
	<div class="col-sm-6">
		@if(Auth::check())
		  	@if(Auth::user()->ownerOrAdmin($obj))
				<form action="{{ route($route.'.delete', $obj->id) }}" method="POST" role="form">
					<a class="btn btn-default"
						href="{{ route($route.'.edit', $obj->id) }}">
						<i class="fa fa-edit"></i>
		  				<span>Modifye</span>
					</a>
					<button onclick='return confirm("Ou Vle Efase {{ $obj->name }} tout bon?")'
						class="btn btn-danger">
						<i class="fa fa-trash-o"></i>
						<span>Efase</span>
					</button>

					{{ csrf_field() }}
					{{ method_field('DELETE') }}
				</form>
				<br>
			@endif
		@endif
	</div>
	<div class="col-sm-6 text-right">
		@if($route !== 'playlist')
			@if (Auth::check())
				<div class="btn-group btn-group-lg" id="vote-btn">
					{!! TKPM::vote($class, $obj->id, $obj->vote_up, $obj->vote_down) !!}

					@if ($route ==  'music')
						<a class="btn btn-success"
							title="Ajoute mizik sa a nan lis mizik ou"
							data-toggle="modal" href='#ajoute-mizik'>
							<i class="fa fa-list"></i>
							<i class="fa fa-plus"></i>
						</a>

						@include('inc.playlist-modal')
					@endif
				</div>
			@endif
			<br>
		@endif
	</div>
</div>


@if ($route !== 'playlist')
	  	<a class="btn btn-success downloadButton"
	  		href="{{ route($route.'.get', $obj->id)}}"
	  		target="_blank">
	  		<i class="fa fa-download"></i>
	  		<span>Telechaje</span>
	  	</a>
@endif