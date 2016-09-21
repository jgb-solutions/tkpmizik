@extends('layout.main')

@section('title')
	{{ $title = 'Navige Tout Mizik Yo' }}
@stop

@section('content')

<div class="col-sm-8">
	@if (count($musics))
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				<i class="fa fa-music"></i>
				{{ $title }}
			</h2>
		</div>
		<br>
		@include('inc.alert')
		<div class="row">
			@include('music.grid-12')
		</div>

		<div class="text-center">
			{{ $musics->links() }}
		</div>
	@else
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">Poko gen mizik (-_-)</h2>
		</div>
	@endif

</div>

@stop