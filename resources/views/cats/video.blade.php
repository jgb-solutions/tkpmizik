@extends('layout.main')

@section('title')
	{{ $title = "Navige Tout Videyo $cat->name yo"}}
@stop

@section('content')

	<div class="col-sm-8">

		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				<i class="fa fa-video-camera"></i>
				{{ $title }}
			</h2>
		</div>

		<br>

		@if(count($videos))
		<div class="row">
			@foreach($videos as $type)
				@include('inc.cat-search.grid-3')
			@endforeach
		</div>

		<div class="text-center">
			{{ $videos->links() }}
		</div>

		@else
		<div class="row bg-black btrr bbrr">
			<h3 class="text-center">Poko Gen Videyo {{ $cat->name }}</h3>
		</div>

		@endif

	</div>

@stop