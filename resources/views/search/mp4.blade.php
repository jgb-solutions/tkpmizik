@extends('layout.main')

@section('content')

	<div class="col-sm-8">

		@if( count($mp4s) )

		<div class="row bg-black">
			<h2 class="text-center">
				Nou jwenn {{ $mp4s->count() }} Videyo pou: "{{ $query }}"
			</h2>
		</div>

		<hr>

		@include('mp4.grid-12')

		@else

		<div class="row bg-black">
			<h2 class="text-center">Nou pa jwenn videyo ki rele: "{{ $query }}"</h2>

		@endif
		</div>

		<div class="text-center">
			{{ $mp4s->links() }}
		</div>


	</div>

@stop