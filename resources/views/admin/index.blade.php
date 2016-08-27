@extends('layout.admin')

@section('title')
	{{ $title }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center"><i class="fa fa-bar-chart"></i> {{ $title }}</h1>
	</div>
	<br>

	@section('alert')
	@stop
	@include('inc.alert')
	@include('inc.errors')

	<div class="row">
		<div class="col-sm-6">
			<div class="row bg-black btrr bbrr white">
				<h3 class="text-center">
					<a
						href="{{route('admin.music')}}">
						<i class="fa fa-music"></i>
						Mizik ({{ $musics_count }})
					</a>
				</h3>
			</div>
			<br>

			@include('admin.modules.musics')

			<p class="text-center">
				<a href="{{ route('music.upload') }}" class="btn btn-primary btn-lg">
					<i class="fa fa-music"></i> Mete Mizik
				</a>
			</p>

			<br>

			<div class="row bg-black btrr bbrr white">
				<h3 class="text-center">
					<a
						href="{{route('admin.video')}}">
						<i class="fa fa-video-camera"></i>
						Videyo ({{ $videos_count }})
					</a>
				</h3>
			</div>
			<br>

			@include('admin.modules.videos')

			<p class="text-center">
				<a href="{{ route('video.upload') }}" class="btn btn-danger btn-lg">
					<i class="fa fa-video-camera"></i> Mete Videyo
				</a>
			</p>

		</div>

		<div class="col-sm-6">
			<div class="row bg-black white btlr bblr">
				<h3 class="text-center">
					<a
						href="{{ route('admin.cat') }}">
						<i class="fa fa-th-list"></i>
						Kategori ({{ $cats_count }})
					</a>
				</h3>
			</div>
			<br>

			@include('admin.modules.categories')

			<p class="text-center">
				<a href="{{route('admin.cat')}}" class="btn btn-primary btn-lg">
					<i class="fa fa-th-list"></i> Kreye Kategori
				</a>
			</p>

			<br>
			<div class="row bg-black white btlr bblr">
				<h3 class="text-center">
					<a href="{{ route('admin.users') }}">
						<i class="fa fa-user"></i>
						Itilizatè ({{ $users_count }})
					</a>
				</h3>
			</div>
			<br>
			@include('admin.modules.users')
		</div>
	</div>
</div>

@stop