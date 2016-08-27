@extends('layout.main')

@section('title')
	{{ $title }}
@stop

@section('content')

<div class="col-sm-8">
	@if ( count( $users ) )
			<div class="row bg-black">
				<h2 class="text-center">
					<i class="fa fa-user"></i>
					{{ $title }}
				</h2>
			</div>
			<hr>
		{{-- @include('users.grid-12') --}}
		@include('users.list')

		<div class="text-center">
			{{ $users->links() }}
		</div>
	@else
		<div class="row bg-black">
			<h2 class="text-center">Poko gen itilizatè (-_-)</h2>
		</div>
	@endif

</div>

@stop