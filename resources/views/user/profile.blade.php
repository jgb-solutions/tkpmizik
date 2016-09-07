@extends('layout.nosidebar')

@section('content')

@section('seo')
<?php TKPM::seo($user, 'user', $author) ?>
@stop

@section('title')
 	{{ $title }}
@stop

@include('user.profile-stats')

<div class="col-sm-8">
	<hr class="visible-xs">
	<div class="row bg-black btlr bblr">
		<h3 class="text-center">
			Ou genyen {{ $musiccount }} Mizik ak {{ $videocount }} Videyo
		</h3>
	</div>

	<br>

	@if ($musiccount)

		@include('music.grid-12')

		<div class="text-center">
			<a href="{{ route('user.musics') }}" class="btn btn-primary btn-lg">
				<i class="fa fa-music"></i>
				Tcheke Tout Mizik Ou Yo
			</a>
		</div>

		@else
			<div class="row bg-black btlr bblr">
				<h3 class="text-center">Ou poko gen mizik. <i class="fa fa-smile-o"></i></h3>
			</div>
			<br>
			<p class="text-center">
				<a
					href="{{ route('music.upload') }}"
					class="btn btn-primary btn-lg">
					<i class="fa fa-music"></i>
					Mete Mizik
				</a>
			</p>
		@endif

		@if ( $videocount > 0 )

		<hr>

		@include('video.grid-12')

		<div class="text-center">
			<p>
				<a href="{{ route('user.videos') }}" class="btn btn-danger btn-lg">
					<i class="fa fa-video-camera"></i>
					Tcheke Tout Videyo Ou Yo
				</a>
			</p>
		</div>
	@else
		<hr>
		<div class="row bg-black btlr bblr">
			<h3 class="text-center">Ou poko gen videyo. <i class="fa fa-smile-o"></i></h3>
		</div>
		<br>
		<p class="text-center">
			<a
				href="{{ route('video.upload') }}"
				class="btn btn-danger btn-lg">
				<i class="fa fa-video-camera"></i>
				Mete Videyo
			</a>
		</p>
	@endif
</div>

@stop