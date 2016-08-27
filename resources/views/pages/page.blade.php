@extends('layout.main')

@section('title')
	{{ $page->title }}
@stop

@section('content')

<div class="col-sm-8">

	<div class="row bg-black">
		<h1 class="text-center">{{ $page->title }}</h1>
	</div>
	<hr>

	<div id="page-content">{!! $page->content !!}</div>
	<p>&nbsp;</p>

</div>

@stop