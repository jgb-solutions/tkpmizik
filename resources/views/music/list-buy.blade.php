@extends('layout.main')

@section('title')
	{{ $title }}
@stop

@section('content')

<div class="col-sm-8">

	@if ( count( $mp3s ) > 0 )
			<div class="row bg-black">
				<h2 class="text-center">
					<i class="fa fa-music"></i>
					{{ $title }}
					<i class="fa fa-dollar"></i>
				</h2>
			</div>
			<hr>
		@include('mp3.grid-12')

		<div class="text-center">
			{{ $mp3s->links() }}
		</div>
	@else
		<div class="row bg-black">
			<h2 class="text-center">Poko gen mizik pou vann (-_-)</h2>
		</div>
	@endif

</div>

@stop