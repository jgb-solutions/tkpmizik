@extends('layout.main')

@section('title')
	{{ $name = $playlist->name }}
@stop

{{--@section('seo')
	{!! TKPM::seo($playlist, 'playlist', $author) !!}
@stop--}}

@section('content')

<div class="col-sm-8">


	<div class="row bg-black btrr bbrr">
		<h2 class="text-center">
			{{ $name }}
		</h2>
		<p class="text-center text-muted">
			<em>
				<i class="fa fa-user"></i>
				<a
					href="{{ TKPM::profileLink($playlist->user->username, $playlist->user->id) }}"
					class="text-muted">{{ $playlist->user->name }}</a> /
				<i class="fa fa-calendar"></i>
				{{ $playlist->created_at->format('d/m/Y')}}
				- {{ $playlist->created_at->format('g:h A')}}
			</em>
		</p>
	</div>
	<br>
	@include('playlists.player')

	<p>{!! '<br>' . $playlist->description !!}</p>

	<hr>
	@include('inc.actions', [
		'obj' => $playlist,
		'class' => 'playlist',
		'route' => 'playlist'
	])

	<hr>

	@include('inc.sharing', [
		'url' => $playlist->url,
		'obj' => $playlist
	])

	<hr>

	@include('inc.links', [
		'type' => 'playlist',
		'obj' => $playlist
	])



	<hr>
	@include('inc.ads.bottom')
	<hr>

</div>

@stop