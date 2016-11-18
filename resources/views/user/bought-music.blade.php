@extends('layout.nosidebar')

@section('content')

@section('title')
	{{ $title }}
@stop

@include('user.profile-stats')

<div class="col-sm-8">

	@if ( Session::has('message') )
		<div class="alert alert-info fade in" role="alert">
      		<button type="button" class="close" data-dismiss="alert">
      			<span aria-hidden="true">×</span>
      			<span class="sr-only">Fèmen</span>
      		</button>
      		<h1>{{ Session::get('message') }}</h1>
    	</div>
	@endif

	<div class="bg-danger">

		@if( $errors )
			<ul class="list-unstyled">
				@foreach ( $errors->all('<li>:message</li>') as $error )
					{{ $error }}
				@endforeach
			</ul>
		@endif

	</div>
	<hr class="visible-xs">

	@if( $bought_count > 0 )

	<div class="row bg-black">
		<h3 class="text-center">{{ $title }}</h3>
	</div>

	<hr>

	@include('mp3.grid-12')

	@else

	<div class="row bg-black bblr btlr">
		<h3 class="text-center">Nou regrèt, men ou poko achte mizik.</h3>
	</div>
	<hr>
	<p class="text-center">
		<a
			href="{{ route('buy.list') }}"
			class="btn btn-primary btn-lg">
			<i class="fa fa-music"></i>
			Achte Yon Mizik
			<i class="fa fa-dollar"></i>
		</a>
	</p>

	@endif
</div>

@stop