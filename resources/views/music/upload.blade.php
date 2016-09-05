@extends('layout.nosidebar')

@section('title')
	{{ $title = 'Mete Mizik' }}
@stop

@section('content')

	<div class="col-sm-12">
		<div class="row bg-black">
			<h1 class="text-center">
			<i class="fa fa-music"></i>
			{{ $title }}
		</h1>
		</div>
		<br>
	</div>

	<div class="col-sm-8 col-sm-offset-2">

		@include('inc.errors')

		<form action="{{route('music.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" id ='udpForm'>
			{{ csrf_field() }}
		{{--@if ( Auth::user() )
			@include('inc.free-paid')
		@endif --}}

			<div class="form-group">
				<label
					for="name"
					class="col-sm-4 control-label">Mete Non Mizik la
				</label>
				<div class="col-sm-8">
					<input
						required
						type="text"
						name="name"
						class="form-control"
						id="name"
						placeholder="Bay mizik la yon tit"
						value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label
					for="artist"
					class="col-sm-4 control-label">Mete Non Atis la
				</label>
				<div class="col-sm-8">
					<input
						required
						type="text"
						name="artist"
						class="form-control"
						id="artist"
						placeholder="Bay non atis ki f&egrave; mizik la"
						value="{{ old('artist') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="music" class="col-sm-4 control-label">Chwazi fichye mizik la</label>
				<div class="col-sm-8">
					<input required name="music" class="form-control" type="file" id="music" accept=".mp3">
				</div>
			</div>

			<div class="form-group">
				<label for="imagefile" class="col-sm-4 control-label">Chwazi Yon Imaj</label>
				<div class="col-sm-8">
					<input required name="image" class="form-control" type="file" id="imagefile" accept=".jpg,.png,jpeg,.gif">
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 control-label">Kategori Mizik la</label>
				<div class="col-sm-8">
					<select class="form-control" name="cat" id="category">

					@foreach( $cats as $cat )

						<option
							value="{{ $cat->id }}"
							{{ $cat->slug == 'rap' ? 'selected' : '' }}>
							{{ $cat->name }}
						</option>

					@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-4 control-label">Detay Mizik la</label>
				<div class="col-sm-8">
					<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="Bay kèk enfòmasyon sou mizik la">{{old('description') }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-4">
					<p>
						<button type="submit" class="btn btn-primary btn-lg" id="submitButton">
							<i class="fa fa-cloud-upload"></i>
							Mete Mizik la
						</button>
					</p>
				</div>
			</div>

			<div class="form-group" id="progress">
				<div class="col-sm-12">
					@include('inc.progress-bar')
				</div>
			</div>

			<div class="panel panel-default hide-panel">
				<ul class="list-group bg-danger" id="upMessage"></ul>
			</div>
		</form>

		<br>
	</div>

@stop