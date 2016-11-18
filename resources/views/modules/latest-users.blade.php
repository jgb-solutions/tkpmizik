<div class="list-group">
  	<a href="{{ route('users') }}" class="list-group-item bg-black">
    	<h4 class="white"><i class="fa fa-user"></i> Itilizatè Resan</h4>
  	</a>

	@if ($users && count($users) )
		<ul class="list-unstyled">

			@foreach( $users as $user )

			<strong>
				<a
					class="list-group-item"
					href="{{ $user->url }}">
					<i class="fa fa-user"></i> {{ $user->name }}
				</a>
			</strong>

			@endforeach
		</ul>
	@endif
</div>