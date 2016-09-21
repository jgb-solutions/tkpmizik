@extends('layout.main')

@section('title')
	{{ $title = 'Navige Tout Videyo Yo' }}
@stop

@section('content')

<div class="col-sm-8">

	@if ( count( $videos ) )
			<div class="row bg-black btrr bbrr">
				<h2 class="text-center">
					<i class="fa fa-video-camera"></i>
					{{ $title }}
				</h2>
			</div>
			<br>
			<div class="row">
				@foreach ($videos as $video)
					@include('inc.video.grid-3')
				@endforeach
			</div>

		<div class="text-center">
			{{ $videos->links() }}
		</div>
	@else
		<div class="row bg-black">
			<h2 class="text-center">Poko gen videyo (-_-)</h2>
		</div>
	@endif

</div>

@stop