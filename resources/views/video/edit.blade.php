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
	{{ Form::open(['url' => TKPM::route('video.update', $video->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) }}
		<div class="form-group">
			<label for="name" class="control-label col-sm-4">Non Videyo a</label>
			<div class="col-sm-8">
				<input
					name="name"
					type="name"
					class="form-control"
					id="name"
					placeholder="Antre non videyo a" value="{{ $video->name }}">
			</div>
		</div>

		<div class="form-group">
			<label for="artist" class="control-label col-sm-4">Mete Non Atis la</label>
			<div class="col-sm-8">
				<input name="artist" type="artist" class="form-control" id="artist" placeholder="Bay non atis ki f&egrave; videyo a" value="{{ $video->artist }}">
			</div>
		</div>

		<div class="form-group">
			<label for="category" class="control-label col-sm-4">Kategori</label>
			<div class="col-sm-8">
				<select class="form-control" name="cat">
				@foreach( $cats as $cat )
					<option
						value="{{ $cat->id }}"
						{{ $cat->id == $video->category_id ? 'selected' : '' }}>
						{{ $cat->name }}
					</option>
				@endforeach
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="description" class="control-label col-sm-4">Deskripsyon</label>
			<div class="col-sm-8">
				<textarea
					name="description"
					id="description"
					class="form-control"
					placeholder="Bay kèk enfòmasyon sou videyo w la">{{ $video->description }}</textarea>
			</div>
		</div>

		@if ($user->admin)
			<div class="form-group">
		    	<label for="featured" class="control-label col-sm-4">
		      	 Pwomote
		    	</label>
		    	<div class="col-sm-8">
		    		<input type="checkbox" name="featured" {{ $video->featured ? 'checked' : '' }} id="featured">
		    	</div>
			</div>
		@endif

		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">
				<button type="submit" class="btn btn-primary btn-lg">
					<i class="fa fa-cloud-upload"></i>
					Modifye
				</button>
			</div>
		</div>
	{{ Form::close() }}

	<br>

</div>

@stop