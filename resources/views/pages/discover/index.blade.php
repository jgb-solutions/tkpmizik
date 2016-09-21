@extends('layout.pages')

@section('title')
	{{ $title = "Dekouvri Mizik ak Videyo"}}
@stop

@section('content')

	@if($musics->count())
		<div class="col-sm-12">
			<div class="row bg-black">
				<h3 class="text-center text-uppercase">
					<i class="fa fa-music"></i>
					Dekouvri Mizik
				</h3>
			</div>

			<br>

	    	<div class="row">
		    	@include('inc.discover-music')
		   </div>

				<div class="col-sm-12">
					<p class="text-center">
						<a
							href="{{ route('discover.music') }}"
							class="btn btn-lg btn-primary">
							<i class="fa fa-music"></i>
							Dekouvri Plis Mizik
						</a>
					</p>
				</div>
		</div>
	@endif

	@if($musics->count())
		<div class="col-sm-12">
			<div class="row bg-black">
				<h3 class="text-center text-uppercase">
					<i class="fa fa-video-camera"></i> Dekouvri Videyo
				</h3>
			</div>

			<br>

    		<div class="row">
 				@include('inc.discover-video')
 			</div>
			<div class="col-sm-12">
				<p class="text-center">
					<a
						href="{{ route('discover.video') }}"
						class="btn btn-lg btn-danger">
						<i class="fa fa-video-camera"></i>
						Dekouvri Plis Videyo
					</a>
				</p>
			</div>
		</div>
	@endif

@stop