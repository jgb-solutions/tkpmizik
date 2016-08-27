@extends('layout.nosidebar')

@section('title')
	{{ $title }}
@stop

@section('content')

	<div class="col-sm-12">
		<div class="row bg-black">
			<h1 class="text-center">
			<i class="fa fa-video-camera"></i>
			{{ $title }}
		</h1>
		</div>
		<br>
	</div>

	<div class="col-sm-8 col-sm-offset-2">

		@include('inc.errors')

		<form method="POST"  action="{{ route('video.store') }}" class="form-horizontal">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name" class="col-sm-4 control-label">Mete Non Videyo a</label>
				<div class="col-sm-8">
					<input required type="text" name="name" class="form-control" id="name" placeholder="Antre Non Videyo YouTube la" value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="artist" class="col-sm-4 control-label">Mete Non Atis la</label>
				<div class="col-sm-8">
					<input required type="text" name="artist" class="form-control" id="artist" placeholder="Bay non atis ki f&egrave; videyo a" value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="col-sm-4 control-label">Mete Lyen Videyo a</label>
				<div class="col-sm-8">
					<input required type="url" name="url" class="form-control" id="url" placeholder="Antre Lyen Videyo YouTube la" value="{{ old('url') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 control-label">Kategori Videyo a</label>
				<div class="col-sm-8">
					<select class="form-control" name="cat">

					@foreach( $categories as $category )
						<option
							value="{{ $category->id }}"
							{{ $category->slug == 'rap' ? 'selected' : '' }}>
							{{ $category->name }}
						</option>
					@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-4 control-label">Detay videyo a</label>
				<div class="col-sm-8">
					<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="Bay kèk enfòmasyon sou videyo a" >{{ old('description') }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-4">
					<p>
						<button type="submit" class="btn btn-primary btn-lg">
							<i class="fa fa-cloud-upload"></i>
							Mete Videyo a
						</button>
					</p>
				</div>
			</div>

		{{ Form::close() }}

		<br>
	</div>

@stop