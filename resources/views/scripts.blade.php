@if ( App::isLocal() )
	<script src="{{ TKPM::asset(elixir('js/vendor.js')) }}"></script>
@else
	@include('inc.fb-script')
    {{-- Google Analytics --}}
	{{-- @include('inc.ga') --}}

	<!-- Latest compiled and minified CSS & JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.8.0/loading-bar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/soundmanager2/2.97a.20150601/script/soundmanager2-nodebug-jsmin.js"></script>
    <script src="https://cdn.rawgit.com/scottschiller/SoundManager2/master/demo/360-player/script/berniecode-animator.js"></script>
    <script src="https://cdn.rawgit.com/scottschiller/SoundManager2/master/demo/360-player/script/360player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.9/ng-file-upload-shim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.9/ng-file-upload.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/add-on/jplayer.playlist.min.js"></script>
@endif

<script src="{{ TKPM::asset(elixir('js/app.js')) }}"></script>

@section('scripts')
@show