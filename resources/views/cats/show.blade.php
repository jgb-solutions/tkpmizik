@extends('layout.main')

@section('title')
	{{ $title }}
@stop

@section('seo')
	{!! TKPM::seo($cat, 'cat', $author) !!}
@stop

@section('content')
	<div class="col-sm-8">
		<div class="row bg-black btrr bbrr">
			<h2 class="text-center">{{ $title }}</h2>
		</div>

		<br>

		@if( $results->count())
			@include('cats.grid-12')

			<div class="col-sm-12 text-center">
				@if ($musiccount)
					<p>
						<a
							href="{{ route('cat.music', ['slug' => $cat->slug]) }}"
							class="btn btn-primary btn-lg"
						>
							<i class="fa fa-music"></i>
							Tout Mizik {{ $cat->name }} Yo
						</a>
					</p>
				@endif

				@if ($videocount)
					<p>
						<a
							href="{{ route('cat.video', ['slug' => $cat->slug])}}"
							class="btn btn-danger btn-lg">
							<i class="fa fa-video-camera"></i>
							Tout Videyo {{ $cat->name }} Yo
						</a>
					</p>
				@endif
			</div>
		@else
			<div class="row bg-black btrr bbrr">
				<h3 class="text-center">Poko gen mizik ak videyo {{ $cat->name }}</h3>
			</div>
		@endif

	</div>

@stop