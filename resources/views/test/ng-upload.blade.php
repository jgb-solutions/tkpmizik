<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<title>NG File Upload</title>
	{{-- <script src="angular.min.js"></script> --}}
	<!-- shim is needed to support non-HTML5 FormData browsers (IE8-9)-->
	{{-- <script src="ng-file-upload-shim.min.js"></script> --}}
	{{-- <script src="ng-file-upload.min.js"></script> --}}
	@include('styles')
	@include('scripts')
</head>
<body ng-app="fileUpload" ng-controller="MyCtrl">
<div class="container">
{{-- action="{{TKPM::route('music.store')}}" --}}
	<form name="form"  method="POST"
		enctype="multipart/form-data" class="form-horizontal"
		ng-submit="submit()">
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
						<i class="fa fa-music"></i> Chwazi Mizik La
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
						<i class="fa fa-image"></i> Chwazi Yon Imaj
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
			<label for="category" class="col-sm-4 control-label"><i class="fa fa-folder fa-2x"></i></label>
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
			<label for="description" class="col-sm-4 control-label"><i class="fa fa-pencil-square-o fa-2x"></i></label>
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

		<div class="form-group" ng-show="showPB">
			<div class="col-sm-8 col-sm-offset-4">
				<div class="progress">
					<div class="progress-bar progress-bar-success"
					role="progressbar" aria-valuenow="@{{pbWidth}}" aria-valuemin="@{{pbWidth}}"
					aria-valuemax="100" style="width: @{{pbWidth}}%;">
					@{{pbWidth}}%
					</div>
				</div>
			</div>
		</div>

		<div class="form-group" ng-show="showErrors">
			<div class="col-sm-8 col-sm-offset-4">
				<div class="panel panel-default">
					<ul class="list-group bg-danger" ng-repeat="namedErrors in errors">
						<li class="list-group-item" ng-repeat="error in namedErrors">@{{error}}</li>
					</ul>
				</div>
			</div>
		</div>
	</form>
</div>


	<script>
		//inject directives and services.
		var app = angular.module('fileUpload', ['ngFileUpload']);
		app.config(['$httpProvider',function($httpProvider) {
			$httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		}]);
		app.controller('MyCtrl', ['$scope', 'Upload', function ($scope, Upload) {
			// upload later on form submit or something similar
			$scope.description = '';
			$scope.pbWidth = 0;

			$scope.submit = function() {
				console.log($scope.category);
				if ($scope.form.$valid) {
					console.log($scope.image, $scope.music);
					$scope.upload($scope.image, $scope.music);
				}
			};
			// upload on file select or drop
			$scope.upload = function (image, music) {
				$scope.showPB = false;

				Upload.upload({
					url: '{{TKPM::route('music.store')}}',
					data: {
						name: $scope.name,
						artist: $scope.artist,
						category: $scope.category,
						image: image,
						music: music,
						description: $scope.description

					}
				}).then(function (resp) {
					console.log(resp.data);
					}, function (resp) {
						console.log('Error status: ' + resp.status);
						$scope.errors = resp.data;
						$scope.showErrors = true;
					}, function (evt) {
						$scope.showPB = true;
						$scope.pbWidth = parseInt(100.0 * evt.loaded / evt.total);
						console.log('progress: ' + $scope.pbWidth + '% ');
					}
				);
			};
		}]);
	</script>
</body>
</html>