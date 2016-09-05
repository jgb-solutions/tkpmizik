@if(Auth::check())
  	@if(Auth::user()->ownerOrAdmin($obj))
		<div class="btn-group">
			<form action="{{ route($route.'.delete', $obj->id) }}" method="POST" class="form-inline">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
							<a
				class="btn btn-default btn-lg"
				href="{{ route($route.'.edit', $obj->id) }}">
				<i class="fa fa-edit"></i>
	  			<span>Modifye</span>
			</a>
				<button
					onclick='return confirm("Ou Vle Efase {{ $obj->name }} tout bon?")'
					class="btn btn-danger btn-lg">
					<i class="fa fa-trash-o"></i>
				<span>Efase</span>
				</button>.get
			</form>
		</div>
		<hr class="visible-xs">
	@endif
@endif

@if ($route !== 'playlist')
	<div class="btn-group btn-group-lg">
	  	<a
	  		class="btn btn-success"
	  		href="{{ route($route.'.get', $obj->id)}}"
	  		target="_blank">
	  		<i class="fa fa-download"></i>
	  		<span>Telechaje</span>
	  	</a>
	</div>
@endif

@if($route !== 'playlist')
	@if (Auth::check())
		<div class="btn-group btn-group-lg">
			{!! TKPM::vote($class, $obj->id, $obj->vote_up, $obj->vote_down) !!}
		</div>
	@endif
@endif