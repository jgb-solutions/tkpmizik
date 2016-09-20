@extends('layout.nosidebar')

@section('content')

@section('title')
{{ $title }}
@stop

@section('seo')
<?php TKPM::seo($user, 'user', $author) ?>
@stop

@include('user.profile-stats')

<div class="col-sm-8">

	<hr class="visible-xs">

	<div class="row bg-black btlr bblr">
		<h3 class="text-center">
			{{ $first_name }} gen {{ $musiccount }} Mizik ak {{ $videocount }} Videyo
		</h3>
	</div>

	<hr>

	@if ( $musiccount > 0 )

		<div class="row bg-primary btlr bblr">
			<h3 class="text-center">
				<i class="fa fa-music"></i>
				Mizik {{ $first_name }} Yo
			</h3>
		</div>

		<hr>

		@include('music.grid-12')

		<p class="text-center">
			<a href="{{ TKPM::profileLink($user->username, $user->id) }}/mizik" class="btn btn-primary btn-lg">
				<i class="fa fa-music"></i>
				Tout Mizik {{ $first_name }} Yo
			</a>
		</p>
	@else
		<div class="row bg-black btlr bblr">
			<h3 class="text-center">{{ $first_name }} poko gen mizik.</h3>
		</div>
	@endif

	@if ( $videocount > 0 )

		&nbsp;<hr>
		<div class="row bg-danger btlr bblr">
			<h3 class="text-center">
				<i class="fa fa-video-camera"></i>
				Videyo {{ $first_name }} Yo
			</h3>
		</div>
		
		<hr>

		@include('video.grid-12')

		<p class="text-center">
			<a href="{{ TKPM::profileLink($user->username, $user->id) }}/videyo" class="btn btn-danger btn-lg">
				<i class="fa fa-video-camera"></i>
				Tout Videyo {{ $first_name }} Yo
			</a>
		</p>

	@else
		&nbsp;<hr>
		<div class="row bg-black btlr bblr">
			<h3 class="text-center">{{ $first_name }} poko gen videyo.</h3>
		</div>
	@endif

</div>

@stop