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
	<hr>
	@section('alert')
	@stop
	@include('inc.alert')
	@include('admin.modules.videos')

	<div class="text-center">
		{{ $videos->links() }}
	</div>
</div>

@stop