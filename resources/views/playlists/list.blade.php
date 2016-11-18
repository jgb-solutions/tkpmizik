@extends('layout.simple')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h2 class="text-center"><i class="fa fa-th-list"></i> {{ $title }}</h2>
	</div>
	<br>
</div>

<div class="col-sm-10 col-sm-offset-1">

	@include('inc.errors')

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			@if ($musics->count() > 0)
				@include('playlists.grid-musics')
			@else
				<div class="row bg-black btlr btrr bbrr bblr">
					<h3 class="text-center"><i class="fa fa-th-list"></i> Lis sa a poko gen mizik.</h3>
				</div>
			@endif
		</div>
	</div>
</div>

@stop