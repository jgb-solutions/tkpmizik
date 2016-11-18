@extends('layout.main')

@section('title')
	{{ $title = 'Kontakte nou'}}
@stop

@section('content')

<div class="col-sm-8">
	<div class="row bg-black">
		<h1 class="text-center">{{ $title }}</h1>
	</div>

	<div id="page-content"></div>
	<p>&nbsp;</p>

</div>

@stop