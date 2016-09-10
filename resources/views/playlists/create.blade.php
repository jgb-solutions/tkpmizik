@extends('layout.admin')

@section('title')
	{{ $title = 'Kreye Lis Mizik' }}
@stop

@section('search-results')
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h2 class="text-center"><i class="fa fa-th-list"></i> {{ $title }}</h2>
	</div>
	<br>
</div>

<div class="col-sm-10 col-sm-offset-1">

	@include('inc.errors')

	<div class="row">
		<div class="col-sm-6">
			<form action="{{route('playlists.create')}}" method="POST">
				<div class="form-group">
					<input name="name" type="name" class="form-control" id="name" placeholder="Non Lis Mizik La" value="{{old('name')}}" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-list"></i>
						Kreye Lis Mizik La
					</button>
				</div>

				{{ csrf_field() }}
			</form>
		</div>

		<div class="col-sm-6">
			@if ($playlists->count() > 0)
				@include('admin.modules.playlists')
			@else
				<div class="row bg-black btlr btrr bbrr bblr">
					<h3 class="text-center"><i class="fa fa-th-list"></i> Ou poko gen Lis Mizik.</h3>
				</div>
			@endif
		</div>
	</div>
</div>

@stop