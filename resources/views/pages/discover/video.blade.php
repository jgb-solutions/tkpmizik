@extends('layout.pages')

@section('title')
	{{ $title = "Dekouvri Videyo"}}
@stop

@section('content')
		<div class="col-sm-12">
		@if($videos->count())
			<div class="row bg-black">
				<h3 class="text-center text-uppercase">
					<i class="fa fa-video-camera"></i>
					Dekouvri Videyo
				</h3>
			</div>

			<br>

	    		<div class="row">
		    		@include('inc.discover-video')
				<div class="col-sm-12 text-center">
					{{ $videos->links() }}
				</div>
			</div>
    		@endif
	{{-- <hr/> --}}
	</div>
@stop