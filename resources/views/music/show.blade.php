@extends('layout.main')

@section('title')
	{{ $title = $music->title }}
@stop

@section('seo')
	{!! TKPM::seo($music, 'music', $author) !!}
@stop

@section('content')

<div class="col-sm-8">

	@include('music.audio-player')

	<div class="row bg-black bbrr">
		<h2 class="text-center">
			{{ $title }}
			<br>
			<small><small>
				<span class="views_count" data-obj="music" data-id="{{ $music->id }}">{{ $music->views }}</span>
				<i class="fa fa-eye"></i> /
				<span class="play_count" data-obj="music" data-id="{{ $music->id }}">{{ $music->play }}</span>
				<i class="fa fa-headphones"></i> /
				<span class="download_count" data-obj="music" data-id="{{ $music->id }}">{{ $music->download }}</span>
				<i class="fa fa-download"></i> /
				{{ $music->size }}
				<i class="fa fa-file-audio-o"></i>
				<span id="get_token" data-token={{ csrf_token() }}></span>
			</small></small>
		</h2>
		<p class="text-center text-muted">
			<em>
				<i class="fa fa-user"></i>
				<a
					href="{{ TKPM::profileLink($music->user->username, $music->user->id) }}"
					class="text-muted">{{ $music->user->name }}</a> /
				<i class="fa fa-folder"></i>
				<a
					href="{{ route('cat.show', ['slug' => $music->category->slug]) }}"
					class="text-muted">{{ $music->category->name }}</a> /
				<i class="fa fa-calendar"></i>
				{{ $music->created_at->format('d/m/Y')}}
				- {{ $music->created_at->format('g:h A')}}
			</em>
		</p>
	</div>

	<p>{!! '<br>' . $music->description !!}</p>

	<hr>
	@include('inc.actions', [
		'obj' => $music,
		'class' => 'music',
		'route' => 'music'
	])

	<hr>

	@include('inc.sharing', [
		'url' => route('music.show', [
			'id'=> $music->id,
			'slug' => $music->slug
		]),
		'obj' => $music
	])
	<hr>

	@include('inc.links', [
		'type' => 'music',
		'obj' => $music
	])



	<hr>
	@include('inc.ads.bottom')
	<hr>

	@include('music.related')

</div>

@stop