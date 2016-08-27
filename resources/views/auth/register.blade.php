@extends('layout.simple')

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
</div>

<div class="col-sm-12">

	@include('inc.alert')
	@include('inc.errors')

	@include('auth.form-register')

	<br>
</div>

@stop