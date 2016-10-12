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

		<form action="{{TKPM::route('music.store')}}" method="POST"
			enctype="multipart/form-data" class="form-horizontal ng-hide" id='upForm'>
			{{--@if ( Auth::user() )
				@include('inc.free-paid')
			@endif --}}

			<div class="form-group">
				<label
					for="name"
					class="col-sm-4 col-xs-2 control-label">Mete Non Mizik la
				</label>
				<div class="col-sm-8 col-xs-10">
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
					class="col-sm-4 col-xs-2 control-label">Non Atis/Gwoup la
				</label>
				<div class="col-sm-8 col-xs-10">
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
				<label for="music" class="col-sm-4 col-xs-2 control-label">Chwazi fichye mizik la</label>
				<div class="col-sm-8 col-xs-10">
					<input required name="music" class="form-control" type="file" id="music" accept=".mp3">
				</div>
			</div>

			<div class="form-group">
				<label for="imagefile" class="col-sm-4 col-xs-2 control-label">Chwazi Yon Imaj</label>
				<div class="col-sm-8 col-xs-10">
					<input required name="image" class="form-control" type="file" id="imagefile" accept=".jpg,.png,jpeg,.gif">
				</div>
			</div>

			<div class="form-group">
				<label for="category" class="col-sm-4 col-xs-2 control-label">Kategori Mizik la</label>
				<div class="col-sm-8 col-xs-10">
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
				<label for="description" class="col-sm-4 col-xs-2 control-label">Detay Mizik la</label>
				<div class="col-sm-8 col-xs-10">
					<textarea
						name="description"
						class="form-control"
						id="description"
						placeholder="Bay kèk enfòmasyon sou mizik la">{{old('description') }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-8 col-xs-10 col-sm-offset-4">
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
		</form>
			<div ng-hide="uploading" class="nga-default nga-stagger nga-slide-up must-hide ng-show">
				<form name="uploadForm"  method="POST"
					enctype="multipart/form-data"
					class="form-horizontal"
					ng-submit="uploadMusic()"
					novalidate>

					<div class="form-group"
						ng-class="{
							'has-error':uploadForm.music.$invalid && uploadForm.music.$touched,
							'has-success':uploadForm.music.$valid
						}">
						<label for="music" class="col-sm-4 col-xs-2 control-label">
							<i class="fa fa-music fa-2x"></i>
						</label>
						<div class="col-sm-8 col-xs-10">
							<button class="btn btn-warning btn-lg btn-block"
								ngf-select
								ng-model="data.music"
								name="music"
								ngf-pattern="'.mp3'"
								ngf-accept="'.mp3'"
								ngf-max-size="64MB"
								ng-required="true"
								id="music">
								Chwazi Mizik La <i class="fa fa-cloud-upload"></i>
							</button>
							<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
								ng-show="uploadForm.music.$invalid && uploadForm.music.$touched">
					 			<div class="panel-heading">
					 				<i class="fa fa-exclamation-triangle"></i>
						  			Tanpri korije er&egrave; sa yo:
						  		</div>
						  		<ul class="list-group">
						 			<li class="list-group-item" ng-show="uploadForm.music.$error.required">
						    			F&ograve;k ou chwazi yon mizik.
									</li>
									<li class="list-group-item" ng-show="uploadForm.music.$error.maxSize">
					    				F&ograve;k mizik la pa depase 64MB
									</li>
					  			</ul>
							</div>
							<div class="marginTop1em">
								<audio controls ngf-src="data.music" autoplay class="box-shadow"></audio>
							</div>
						</div>
					</div>

					<div class="form-group"
						ng-class="{
							'has-error':uploadForm.image.$invalid && uploadForm.image.$touched,
							'has-success':uploadForm.image.$valid}">
						<label for="imagefile" class="col-sm-4 col-xs-2 control-label"><i class="fa fa-image fa-2x"></i></label>
						<div class="col-sm-8 col-xs-10">
							<button class="btn btn-info btn-lg btn-block"
								ngf-select ng-model="data.image"
								name="image"
								ngf-pattern="'image/*'"
								ngf-accept="'image/*'"
								ngf-max-size="5MB"
								{{-- ngf-min-height="100" --}}
								{{-- ngf-resize="{width: 100, height: 100}" --}}
								ng-required="true"
								id="imagefile">
									Chwazi Yon Imaj <i class="fa fa-cloud-upload"></i>
							</button>
							<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
								ng-show="uploadForm.image.$invalid && uploadForm.image.$touched">
					 			<div class="panel-heading">
					 				<i class="fa fa-exclamation-triangle"></i>
						  			Tanpri korije er&egrave; sa yo:
						  		</div>
						  		<ul class="list-group">
						 			<li class="list-group-item" ng-show="uploadForm.image.$error.required">
						    			F&ograve;k ou chwazi yon imaj pou asosye ak mizik la.
									</li>
									<li class="list-group-item" ng-show="uploadForm.image.$error.maxSize">
					    				F&ograve;k imaj la pa depase 5MB
									</li>
					  			</ul>
							</div>
							<div class="marginTop1em">
								<img ngf-thumbnail="data.image" height="100" class="btlr btrr bbrr bblr box-shadow">
							</div>
						</div>
					</div>
					<div class="form-group"
						ng-class="{'has-error':uploadForm.name.$invalid &&
						uploadForm.name.$touched,
						'has-success':uploadForm.name.$valid}">
						<label
							for="name"
							class="col-sm-4 col-xs-2 control-label"><i class="fa fa-pencil fa-2x"></i>
						</label>
						<div class="col-sm-8 col-xs-10">
							<input
								required
								type="text"
								name="name"
								ng-model="data.name"
								class="form-control"
								id="name"
								placeholder="Bay mizik la yon tit"
								value="{{ old('name') }}">

							<div class="panel panel-danger marginTop1em nga-default nga-stagger nga-fade"
								ng-show="uploadForm.name.$invalid && uploadForm.name.$touched">
						 		<div class="panel-heading">
						 			<i class="fa fa-exclamation-triangle"></i>
						  			Tanpri korije er&egrave; sa yo:
						  		</div>
						  		<ul class="list-group">
						 			<li class="list-group-item" ng-show="uploadForm.name.$error.required">
					   	 			F&ograve;k ou antre non mizik la
									</li>
					  			</ul>
							</div>
						</div>
					</div>

					<div class="form-group"
						ng-class="{'has-error':uploadForm.artist.$invalid &&
						uploadForm.artist.$touched,
						'has-success':uploadForm.artist.$valid}">
						<label
							for="artist"
							class="col-sm-4 col-xs-2 control-label"><i class="fa fa-user fa-2x"></i>
						</label>
						<div class="col-sm-8 col-xs-10">
							<input
								required
								type="text"
								name="artist"
								ng-model="data.artist"
								class="form-control"
								id="artist"
								placeholder="Bay non atis oubyen gwoup ki f&egrave; mizik la"
								value="{{ old('artist') }}">
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


					<div class="form-group">
						<label for="category" class="col-sm-4 col-xs-2 control-label">
							<i class="fa fa-folder fa-2x"></i>
						</label>
						<div class="col-sm-8 col-xs-10">
							<select class="form-control"
								name="category"
								id="category"
								ng-model="data.category">

							@foreach($cats as $cat)
								<option
									value="{{ $cat->id }}"
									{!! $cat->slug == 'rap-kreyol' ? "selected ng-init=\"data.category='$cat->id'\"" : '' !!}>
									{{ $cat->name }}
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
								ng-model="data.description"
								class="form-control"
								id="description"
								placeholder="Bay kèk enfòmasyon sou mizik la">{{old('description') }}</textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-8 col-xs-10 col-sm-offset-4 col-xs-offset-2">
							<p>
								<button
									type="submit"
									class="btn btn-primary btn-lg"
									id="submitButton"
									ng-disabled="uploadForm.$invalid">
									<i class="fa fa-cloud-upload"></i>
									Mete Mizik la
								</button>
							</p>
						</div>
					</div>

					{{ csrf_field() }}
				</form>
			</div>


		<div ng-show="showPB" class="nga-default nga-stagger nga-fade">
			<br>
			
			<div ng-hide="pbWidth==100">
			<br>
			<br>
			<br>
			<br>
			<br>
			</div>
			<div class="progress bg-white box-shadow must-hide ng-show" ng-hide="pbWidth==100" style="height:50px;">
				<div class="progress-bar progress-bar-success"
					role="progressbar" aria-valuenow="@{{pbWidth}}" aria-valuemin="@{{pbWidth}}"
					aria-valuemax="100" style="width: @{{pbWidth}}%;">
					@{{pbWidth}}%
				</div>
			</div>
			<div ng-hide="pbWidth==100" class="must-hide ng-show">
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>
			<div ng-show="processingEmailAndTweet" class="must-hide ng-show">
				<i class="fa fa-spinner fa-spin fa-2x"></i>
			</div>
		</div>

		<div ng-show="showErrors" class="nga-default nga-stagger nga-slide-down must-hide ng-show">
			<div class="panel panel-danger">
			 	<div class="panel-heading">
			  		Tanpri korije er&egrave; sa yo epi eseye ank&ograve;:
			  	</div>
			  	<ul class="list-group" ng-repeat="namedErrors in errors">
			 		<li class="list-group-item" ng-repeat="error in namedErrors">@{{error}}</li>
			  	</ul>
				<div class="panel-body">
				  	<button class="btn btn-warning btn-lg"
						ng-click="showUploadForm()"
						ng-show="tryAgain">
						<i class="fa fa-music"></i>
						Eseye ank&ograve;
						<i class="fa fa-cloud-upload"></i>
					</button>
			  	</div>
			</div>
		</div>

		<div ng-show="uploadSuccess" class="nga-default nga-stagger nga-slide-down must-hide ng-show">
			<div class="panel panel-success">
				<div class="panel-heading">
				    <h3 class="panel-title text-center">
				    Felisitasyon!	Mizik ou a pibliye av&egrave;k sik&egrave;.
				    </h3>
				</div>
				<div class="panel-body">
				   <p ng-hide="emailedAndTweeted">
				   	<i class="fa fa-spinner fa-spin"></i><br>
				   	Tanpri pran yon ti pasyans padan nou ap pataje li sou paj Twitter ak Facebook
				   	Ti Kwen Pam Mizik pou ou. Nou ap voye lyen yo sou imel ou tou.
				   </p>
				   <p ng-show="emailedAndTweeted">
				   	Nou pataje mizik ou a sou paj Facebook ak Twitter Ti Kwen Pam Mizik pou ou.
				   	E nou voye yon imel ki gen lyen mizik ou a pou f&egrave; fanatik ou yo tande
				   	ak telechaje mizik ou a.<br><br>
				   		<a class="btn btn-primary btn-lg"
				   			href="@{{uploadedMusic.url}}">
							<i class="fa fa-music"></i>
							Ale Sou Paj Mizik La
							<i class="fa fa-headphones"></i>
						</a>
						<hr>
						<button class="btn btn-info btn-lg"
							ng-click="showUploadFormAndReset()">
							<i class="fa fa-music"></i>
							Mete Yon L&ograve;t Mizik
							<i class="fa fa-cloud-upload"></i>
						</button>
				   </p>
				</div>
			</div>
		</div>
	</div>
@stop