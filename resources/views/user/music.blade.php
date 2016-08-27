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
		<h3 class="text-center"><i class="fa fa-music"></i> {{ $title }}</h3>
	</div>
	<br>

	@if( $musiccount > 0 )
		@include('music.grid-12')

		<div class="text-center">
			{{ $musics->links() }}
		</div>
	@else
		<div class="row bg-black bblr btlr">
			<h3 class="text-center">Nou regrèt, men {{ $first_name }} poko gen mizik.</h3>
		</div>
		<br>
		<p class="text-center">
			<a
				href="{{route('music.upload')}}"
				class="btn btn-primary btn-lg">
				<i class="fa fa-cloud-upload"></i>
				Mete Yon Mizik
				<i class="fa fa-music"></i>
			</a>
		</p>
	@endif
</div>

@stop