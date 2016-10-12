var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
    // .copy('vendor/bower/angular/angular.min.js', 'resources/assets/js/vendor/angular.js')
    // .copy('vendor/bower/jquery/dist/jquery.min.js', 'resources/assets/js/vendor/jquery.js')

     .less('style.less', 'public/css/app.css')

 	.styles([
 		'vendor/360player.css',
		'vendor/360player-visualization.css',
     'vendor/jplayer/jplayer.blue.monday.min.css',
		'vendor/nga.min.css',
		'vendor/loading-bar.css',
		// 'vendor/jquery.nailthumb.1.1.min.css'
 	], 'public/css/vendor.css')

 	.scripts([
        'vendor/jquery.js',
        'vendor/angular.js',
        'vendor/angular-animate.min.js',
        'vendor/loading-bar.js',
    	// 'vendor/form.min.js',
        'vendor/bootstrap.min.js',
		// 'vendor/lazyload.min.js',
		'vendor/soundmanager2.js',
		'vendor/berniecode-animator.js',
		'vendor/360player.js',
		'vendor/ng-file-upload-shim.min.js',
		'vendor/ng-file-upload.min.js',
		'vendor/jplayer/jquery.jplayer.min.js',
		'vendor/jplayer/jplayer.playlist.min.js',
		// 'vendor/jquery.nailthumb.1.1.min.js',
		// 'vendor/jquery.fakecrop.js',
     ], 'public/js/vendor.js')

    .scripts([
        'app.js',
        'ng-search.js',
        'ng-upload.js',
     ], 'public/js/app.js')

     .version(['css/app.css', 'css/vendor.css', 'js/vendor.js', 'js/app.js'])
});