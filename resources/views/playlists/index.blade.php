@extends('layout.main')

@section('title')
	{{ $title = 'Navige Tout Lis Mizik Yo' }}
@stop

@section('content')

<div class="col-sm-8">
	@if (count($playlists))
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				<i class="fa fa-music"></i>
				{{ $title }}
			</h2>
		</div>

		<br>
		<div class="row">
			@include('playlists.grid-12')
		</div>

		<div class="text-center">
			{{ $playlists->links() }}
		</div>
		<div class="col-xs-12">&nbsp;</div>
	@else
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">Poko gen lis mizik (-_-)</h2>
		</div>
	@endif

</div>

@stop