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

	<div class="col-sm-8 col-sm-offset-2" ng-controller="UploadController">

		@include('inc.errors')

{{-- 		<form action="{{TKPM::route('music.store')}}" method="POST"
			enctype="multipart/form-data" class="form-horizontal" id='upForm'> --}}
			{{--@if ( Auth::user() )
				@include('inc.free-paid')
			@endif --}}

{{-- 			<div class="form-group">
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
					class="col-sm-4 control-label">Non Atis/Gwoup la
				</label>
				<div class="col-sm-8">
					<input
						required
						type="text"
						name="artist"
						class="form-control"
						id="artist"
						placeholder="Bay non atis oubyen gwoup ki f&egrave; mizik la"
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
			{{ csrf_field() }}
		</form> --}}
		<form name="form"  method="POST"
		enctype="multipart/form-data" class="form-horizontal"
		ng-submit="submit()" ng-hide="uploading">
			{{--@if ( Auth::user() )
				@include('inc.free-paid')
			@endif --}}

			<div class="form-group">
				<label
					for="name"
					class="col-sm-4 control-label"><i class="fa fa-pencil fa-2x"></i>
				</label>
				<div class="col-sm-8">
					<input
						required
						type="text"
						name="name"
						ng-model="name"
						class="form-control"
						id="name"
						placeholder="Bay mizik la yon tit"
						value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label
					for="artist"
					class="col-sm-4 control-label"><i class="fa fa-user fa-2x"></i>
				</label>
				<div class="col-sm-8">
					<input
						required
						type="text"
						name="artist"
						ng-model="artist"
						class="form-control"
						id="artist"
						placeholder="Bay non atis oubyen gwoup ki f&egrave; mizik la"
						value="{{ old('artist') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="music" class="col-sm-4 control-label"><i class="fa fa-music fa-2x"></i></label>
				<div class="col-sm-8">
					<button class="btn btn-warning btn-lg"
						ngf-select
						ng-model="music"
						name="music"
						ngf-pattern="'.mp3'"
						ngf-accept="'.mp3'"
						ngf-max-size="15MB"
						id="music">
							Chwazi Mizik La
						</button>
	{{-- 					<input
							required name="music"
							class="form-control"
							type="file"
							id="music"
							accept=".mp3"> --}}
						<p>
							<audio controls ngf-src="music" autoplay></audio>
						</p>
				</div>
			</div>

			<div class="form-group">
				<label for="imagefile" class="col-sm-4 control-label"><i class="fa fa-image fa-2x"></i></label>
				<div class="col-sm-8">
					<button class="btn btn-info btn-lg"
						ngf-select ng-model="image"
						name="image"
						ngf-pattern="'image/*'"
						ngf-accept="'image/*'"
						ngf-max-size="5MB"
						ngf-min-height="100"
						{{-- ngf-resize="{width: 100, height: 100}" --}}
						id="imagefile">
							Chwazi Yon Imaj
						</button>
						<input
							name="image"
							class="form-control hidden"
							type="file"
							id="imagefile"
							accept=".jpg,.png,jpeg,.gif">
						<p>
							<img ngf-thumbnail="image" height="100">
						</p>
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 control-label">
					<i class="fa fa-folder fa-2x"></i>
				</label>
				<div class="col-sm-8">
					<select class="form-control"
						name="category"
						id="category"
						ng-model="category"
						ng-change="logCat()">

					@foreach($cats as $cat)
						<option
							value="{{ $cat->id }}"
							{!! $cat->slug == 'rap-kreyol' ? "selected ng-init=\"category='$cat->id'\"" : '' !!}>
							{{ $cat->name }}
						</option>
					@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-4 control-label">
					<i class="fa fa-pencil-square-o fa-2x"></i>
				</label>
				<div class="col-sm-8">
					<textarea
						name="description"
						ng-model="description"
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

			{{ csrf_field() }}
		</form>

		<div ng-show="showPB">
			<div class="progress">
				<div class="progress-bar progress-bar-success"
				role="progressbar" aria-valuenow="@{{pbWidth}}" aria-valuemin="@{{pbWidth}}"
				aria-valuemax="100" style="width: @{{pbWidth}}%;">
				@{{pbWidth}}%
				</div>
			</div>
		</div>

		<div ng-show="showErrors">
			<div class="panel panel-default">
				<ul class="list-group bg-danger" ng-repeat="namedErrors in errors">
					<li class="list-group-item" ng-repeat="error in namedErrors">@{{error}}</li>
				</ul>
			</div>
		</div>
		<br>
	</div>

@stop