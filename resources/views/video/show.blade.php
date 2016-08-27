@extends('layout.main')

@section('content')

@section('seo')
	{!! TKPM::seo($video, 'video', $author) !!}
@stop

@section('title')
{{ $title = $video->title }}
@stop

<div class="col-sm-8">

	@include('video.video-player')

	<div class="row bg-black bbrr">
		<h2 class="text-center">
			{{ $title }}
			<br>
			<small><small>
				<span class="views_count" data-obj="video" data-id="{{ $video->id }}">{{ $video->views }}</span>
				<i class="fa fa-eye"></i> /
				<span class="download_count" data-obj="video" data-id="{{ $video->id }}">{{ $video->download }}</span>
				<i class="fa fa-download"></i>
				<span id="get_token" data-token={{ csrf_token() }}></span>
			</small></small>
		</h2>
		<p class="text-center text-muted">
			<em>
				<i class="fa fa-user"></i>
				<a
					href="{{ TKPM::profileLink($video->user->username, $video->user->id) }}"
					class="text-muted">{{ $video->user->name }}</a> /
				<i class="fa fa-folder"></i>
				<a
					href="{{ route('cat.show', ['slug' => $video->category->slug]) }}"
					class="text-muted">{{ $video->category->name }}</a> /
				<i class="fa fa-calendar"></i>
				{{ $video->created_at->format('d/m/Y')}}
				- {{ $video->created_at->format('g:h A')}}
			</em>
		</p>
	</div>

	<p>{!! '<br>' . $video->description !!}</p>

	<hr>

	@include('inc.actions', [
		'obj' => $video,
		'class' => 'video',
		'route' => 'video'
	])

	<hr>

	@include('inc.sharing', [
		'url' => route('video.show', ['id'=> $video->id, 'slug' => $video->slug]),
		'obj' => $video
	])
	<hr>
	@include('inc.links', [
		'type' => 'video',
		'obj' => $video
	])

	<hr>
	@include('inc.ads.bottom')
	<hr>

	@include('video.related')

</div>

@stop