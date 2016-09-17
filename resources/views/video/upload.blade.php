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

		<form name="uploadForm"
			method="POST"
			action="{{TKPM::route('video.store')}}"
			class="form-horizontal"
			novalidate >
			{{ csrf_field() }}
{{-- 			<div class="input-group"
				ng-class="{'has-error':uploadForm.name.$invalid &&
						uploadForm.name.$touched,
						'has-success':uploadForm.name.$valid}">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input
						ng-required="true"
						type="text"
						name="name"
						class="form-control"
						id="name"
						placeholder="Antre Tit Videyo YouTube la"
						value="{{ old('name') }}"
						ng-model="data.name"
						ng-init="data.name='{{ old('name') }}'">
			</div>
			<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
				ng-show="uploadForm.name.$invalid && uploadForm.name.$touched">
			 	<div class="panel-heading">
			 		<i class="fa fa-exclamation-triangle"></i>
			  		Tanpri korije er&egrave; sa yo:
			  	</div>
			  	<ul class="list-group">
			 		<li class="list-group-item" ng-show="uploadForm.name.$error.required">
			    		F&ograve;k ou mete tit videyo a.
					</li>
			  	</ul>
			</div> --}}
			<div class="form-group"
				ng-class="{'has-error':uploadForm.name.$invalid &&
						uploadForm.name.$touched,
						'has-success':uploadForm.name.$valid}">
				<label for="name" class="col-sm-4 col-xs-2 control-label">
					<i class="fa fa-pencil fa-2x"></i>
				</label>
				<div class="col-sm-8 col-xs-10">
					<input
						ng-required="true"
						type="text"
						name="name"
						class="form-control"
						id="name"
						placeholder="Antre Tit Videyo YouTube la"
						value="{{ old('name') }}"
						ng-model="data.name"
						ng-init="data.name='{{ old('name') }}'">

						<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
							ng-show="uploadForm.name.$invalid && uploadForm.name.$touched">
						 	<div class="panel-heading">
						 		<i class="fa fa-exclamation-triangle"></i>
						  		Tanpri korije er&egrave; sa yo:
						  	</div>
						  	<ul class="list-group">
						 		<li class="list-group-item" ng-show="uploadForm.name.$error.required">
						    		F&ograve;k ou mete tit videyo a.
								</li>
						  	</ul>
						</div>
				</div>
			</div>

			<div class="form-group"
				ng-class="{'has-error':uploadForm.artist.$invalid &&
						uploadForm.artist.$touched,
						'has-success':uploadForm.artist.$valid}">
				<label for="artist" class="col-sm-4 col-xs-2 control-label">
					<i class="fa fa-user fa-2x"></i>
				</label>
				<div class="col-sm-8 col-xs-10">
					<input
						ng-required="true"
						type="text"
						name="artist"
						class="form-control"
						id="artist"
						placeholder="Bay non atis/gwoup  ki f&egrave; videyo a"
						value="{{ old('artist') }}"
						ng-model="data.artist"
						ng-init="data.artist='{{ old('artist') }}'">

					<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
						ng-show="uploadForm.artist.$invalid && uploadForm.artist.$touched">
					 	<div class="panel-heading">
					 		<i class="fa fa-exclamation-triangle"></i>
					  		Tanpri korije er&egrave; sa yo:
					  	</div>
					  	<ul class="list-group">
					 		<li class="list-group-item" ng-show="uploadForm.artist.$error.required">
					    		F&ograve;k ou mete non atis la (yo).
							</li>
					  	</ul>
					</div>
				</div>
			</div>

			<div class="form-group"
				ng-class="{'has-error':uploadForm.url.$invalid &&
						uploadForm.url.$touched,
						'has-success':uploadForm.url.$valid}">
				<label for="url" class="col-sm-4 col-xs-2 control-label"><i class="fa fa-video-camera fa-2x"></i></label>
				<div class="col-sm-8 col-xs-10">
					<input ng-required="true"
						type="url"
						name="url"
						class="form-control"
						id="url"
						placeholder="Antre Lyen Videyo YouTube la"
						value="{{ old('url') }}"
						ng-model="data.url"
						ng-init="data.url='{{ old('url') }}'">

						<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
							ng-show="uploadForm.url.$invalid && uploadForm.url.$touched">
						 	<div class="panel-heading">
						 		<i class="fa fa-exclamation-triangle"></i>
						  		Tanpri korije er&egrave; sa yo:
						  	</div>
						  	<ul class="list-group">
						 		<li class="list-group-item" ng-show="uploadForm.url.$error.required">
						    		F&ograve;k ou mete yon lyen videyo.
								</li>
								<li class="list-group-item" ng-show="uploadForm.url.$error.url">
						    		F&ograve;k ou mete yon lyen videyo valid.
								</li>
						  	</ul>
						</div>
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 col-xs-2 control-label">
					<i class="fa fa-folder fa-2x"></i>
				</label>
				<div class="col-sm-8 col-xs-10">
					<select class="form-control" name="cat" id="category">

					@foreach( $categories as $category )
						<option
							value="{{ $category->id }}"
							{{ $category->slug == 'rap-kreyol' ? 'selected' : '' }}>
							{{ $category->name }}
						</option>
					@endforeach

					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-4 col-xs-2 control-label">
					<i class="fa fa-pencil-square-o fa-2x"></i>
				</label>
				<div class="col-sm-8 col-xs-10">
					<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="Bay kèk enfòmasyon sou videyo a" >{{ old('description') }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-8 col-xs-10 col-sm-offset-4 col-xs-offset-2">
					<p>
						<button type="submit"
							ng-disabled="uploadForm.$invalid"
							ng-click="submitted='true'"
							class="btn btn-primary btn-lg"
							id="uploadButton">
							<i class="fa fa-cloud-upload"></i>
							Mete Videyo a
							<i class="fa fa-spinner fa-spin" ng-show="submitted"></i>
						</button>
					</p>
				</div>
			</div>
		</form>
		<br>
	</div>

@stop