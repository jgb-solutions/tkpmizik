@extends('layout.main')

@section('content')

	<div class="col-sm-8">

		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">
				<i class="fa fa-video-camera"></i>
				Navige Tout Videyo {{ $cat->name }} yo
			</h2>
		</div>

		<br>

		@if(count($videos))

		@include('video.grid-12')

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