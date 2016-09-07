@extends('layout.nosidebar')

@section('title')
	{{ $title }}
@stop

@section('content')

<div class="col-sm-12">
	<div class="row bg-black">
		<h1 class="text-center">
		<i class="fa fa-edit"></i>
		{{ $title }}
	</h1>
	</div>
	<br>
</div>

<div class="col-sm-8 col-sm-offset-2">

	@if ( ! $music->code && $music->price == 'paid' )

		<div class="alert alert-warning fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert">
	      	<span aria-hidden="true">×</span>
	      	<span class="sr-only">Fèmen</span>
	      </button>
	      <strong>{{ Config::get('site.message.kod-mizik') }}</strong>
	    </div>

	@endif

	@if (! $music->publish)
		<div class="alert alert-info fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert">
	      		<span aria-hidden="true">×</span>
	      		<span class="sr-only">Fèmen</span>
	      	</button>
	      	<strong>{{ Config::get('site.message.aktive') }}</strong>
	    </div>
	@endif

	@include('inc.errors')

	<form action="{{ route('music.edit', ['id'=>$music->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
      {{ method_field('PUT') }}

		@if ( $music->price == 'paid' )
			<div class="form-group">
				<label for="code" class="control-label col-sm-4">Kòd mizik la</label>
				<div class="col-sm-8">
					<input name="code" type="password" class="form-control" id="code" placeholder="Antre kòd mizik la" value="{{ $music->code }}">
				</div>
			</div>
		@endif

		<div class="form-group">
			<label for="name" class="control-label col-sm-4">Non Mizik la</label>
			<div class="col-sm-8">
				<input name="name" type="name" class="form-control" id="name" placeholder="Antre non mizik la" value="{{ $music->name }}">
			</div>
		</div>

		<div class="form-group">
			<label for="artist" class="control-label col-sm-4">Mete Non Atis la</label>
			<div class="col-sm-8">
				<input name="artist" type="artist" class="form-control" id="artist" placeholder="Bay non atis ki f&egrave; mizik la" value="{{ $music->artist }}">
			</div>
		</div>

		<div class="form-group">
			<label for="image" class="control-label col-sm-4">Imaj</label>
			<div class="col-sm-8">
				<input type="file" name="image" id="image" class="form-control" accept=".jpg,.png,jpeg,.gif">
			</div>
		</div>

		<div class="form-group">
			<label for="category" class="control-label col-sm-4">Kategori</label>
			<div class="col-sm-8">
				<select class="form-control" name="cat">

				@foreach( $cats as $cat )
					<option
						value="{{ $cat->id }}"
						{{ $cat->id == $music->category_id ? 'selected' : '' }}>
						{{ $cat->name }}
					</option>
				@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="control-label col-sm-4">Deskripsyon</label>
			<div class="col-sm-8">
				<textarea name="description" id="description" class="form-control"
					placeholder="Di k&egrave;k mo de mizik ou a.">{{ $music->description }}</textarea>
			</div>
		</div>

		{{--@if ( \App\User::is_admin() )
			@include('inc.free-paid')
		@endif

		@if ( \App\User::is_admin() )
			<div class="form-group">
		    	<label for="publish" class="control-label col-sm-4">
		      	 Pibliye
		    	</label>
		    	<div class="col-sm-8">
		    		<input type="checkbox" name="publish" {{ $music->publish ? 'checked' : '' }}>
		    	</div>
			</div>
		@endif --}}

		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
				<button type="submit" class="btn btn-primary btn-lg">
					<i class="fa fa-edit"></i> Modifye
				</button>
			</div>
		</div>
	</form>

	<br>

</div>

@stop