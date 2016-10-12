@if ( App::isLocal() )
	<script src="{{ TKPM::asset(elixir('js/vendor.js')) }}"></script>
	<script src="{{ TKPM::asset(elixir('js/app.js')) }}"></script>
@else
	@include('inc.fb-script')
    {{-- Google Analytics --}}
	{{-- @include('inc.ga') --}}

	<!-- Latest compiled and minified CSS & JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
        'vendor/loading-bar.js',
		'vendor/soundmanager2.js',
		'vendor/berniecode-animator.js',
		'vendor/360player.js',
		'vendor/ng-file-upload-shim.min.js',
		'vendor/ng-file-upload.min.js',
		'vendor/jplayer/jquery.jplayer.min.js',
		'vendor/jplayer/jplayer.playlist.min.js',
		// 'vendor/jquery.nailthumb.1.1.min.js',
		// 'vendor/jquery.fakecrop.js',
@endif

@section('scripts')
@show