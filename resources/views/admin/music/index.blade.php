@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center"><i class="fa fa-music"></i> {{ $title }}</h1>
	</div>
	<br>
	@section('alert')
	@stop
	@include('inc.alert')
	@include('admin.modules.musics')

	<div class="text-center">
		{{ $musics->links() }}
	</div>
</div>

@stop