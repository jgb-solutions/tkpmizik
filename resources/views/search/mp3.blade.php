@extends('layout.main')

@section('content')

	<div class="col-sm-8">

		@if( count($mp3s) )

		<div class="row bg-black">
			<h2 class="text-center">
				Nou jwenn {{ $mp3s->count() }} Mizik pou: "{{{ $query }}}"
			</h2>
		</div>
		<hr>

		@include('mp3.grid-12')

		@else

		<div class="row bg-black">
			<h2 class="text-center">Nou pa jwenn mizik ki rele: "{{ $query }}"</h2>
		</div>

		@endif

		<div class="text-center">
			{{ $mp3s->links() }}
		</div>


	</div>

@stop