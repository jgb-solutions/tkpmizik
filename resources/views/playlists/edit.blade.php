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
			<form action="{{route('playlist.update', ['playlist' => $playlist->id])}}" method="POST">

				<div class="form-group">
					<input name="name" type="name" class="form-control" id="name" placeholder="Non Lis Mizik La" value="{{$playlist->name}}" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-list"></i>
						Modifye Lis Mizik La
					</button>
				</div>

				{{ csrf_field() }}
      		{{ method_field('PUT') }}
			</form>

			<p class="bg-info padding1em btlr btrr bbrr bblr">
				Ou vle modifye mizik ki nan lis sa a pito? <a href="{{route('playlist.musics', ['playlist' => $playlist->id])}}">Klike la</a>
			</p>
		</div>

		<div class="col-sm-6">
			@include('admin.modules.playlists')
		</div>
	</div>
</div>

@stop