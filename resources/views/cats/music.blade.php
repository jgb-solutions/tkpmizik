@extends('layout.main')

@section('content')

	<div class="col-sm-8">
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				<i class="fa fa-music"></i>
				Navige tout mizik {{ $cat->name }} yo
			</h2>
		</div>

		<br>

		@if (count( $musics ))
			@include('music.grid-12')
			<div class="text-center">
				{{ $musics->links() }}
			</div>
		@else
			<div class="row bg-black btrr bbrr">
				<h3 class="text-center">Po gen mizik {{ $cat->name }}</h3>
			</div>
		@endif
	</div>
@stop