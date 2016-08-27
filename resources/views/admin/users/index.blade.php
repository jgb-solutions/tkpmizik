@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center"><i class="fa fa-user"></i> {{ $title }}</h1>
	</div>
	<br>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			@section('alert')
			@stop
			@include('inc.alert')
			@include('admin.modules.users')
			<div class="text-center">
				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>

@stop