@extends('layout.pages')

@section('content')

	<div class="col-sm-12">
		@if($musics->count())
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
			<div class="col-sm-12 text-center">
				{{ $musics->links() }}
			</div>
    		@endif
	{{-- <hr/> --}}
	</div>

@stop