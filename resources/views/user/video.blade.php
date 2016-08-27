@extends('layout.nosidebar')

@section('content')

@section('title')
	{{ $title }}
@stop

@include('user.profile-stats')

<div class="col-sm-8">

	@include('inc.alert')

	@include('inc.errors')

	<hr class="visible-xs">
	<div class="row bg-black bblr btlr">
		<h3 class="text-center"><i class="fa fa-video-camera"></i> {{ $title }}</h3>
	</div>
	<br>

	@if( $videocount > 0 )

	@include('video.grid-12')

	<div class="text-center">
		{{ $videos->links() }}
	</div>

	@else

	<div class="text-center">
		<div class="row bg-black bblr btlr">
			<h3>Nou regrèt men {{ $first_name }} pa gen Videyo</h3>
		</div>
		<br>
		<p>
			<a
				href="{{route('video.upload')}}"
				class="btn btn-danger btn-lg">
				<i class="fa fa-cloud-upload"></i>
				Mete Yon Videyo
				<i class="fa fa-video-camera"></i>
			</a>
		</p>
	</div>
	@endif
</div>

@stop