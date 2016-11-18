var elixir = require('laravel-elixir');

require( 'elixir-jshint' );

var jsAssets = 'resources/assets/js/';
var jsVendor = jsAssets + 'vendor/';


elixir(function(mix) {
    mix
    // .copy('vendor/bower/angular/angular.min.js', 'resources/assets/js/vendor/angular.js')
    // .copy('vendor/bower/jquery/dist/jquery.min.js', 'resources/assets/js/vendor/jquery.js')

    .jshint([
        jsAssets + 'app.js',
        jsAssets + 'ng-search.js',
        jsAssets + 'ng-upload.js'
    ])

    .less('style.less', 'public/css/app.css')

    .styles([
        'vendor/360player.css',
        'vendor/360player-visualization.css',
        'vendor/jplayer/jplayer.blue.monday.min.css',
        'vendor/nga.min.css',
        'vendor/loading-bar.css',
        // 'vendor/jquery.nailthumb.1.1.min.css'
    ], 'public/css/vendor.css')

    .combine([
        jsVendor + 'jquery.js',
        jsVendor + 'angular.js',
        jsVendor + 'angular-animate.min.js',
        jsVendor + 'loading-bar.js',
        jsVendor + 'bootstrap.min.js',
        jsVendor + 'soundmanager2.js',
        jsVendor + 'berniecode-animator.js',
        jsVendor + '360player.js',
        jsVendor + 'ng-file-upload-shim.min.js',
        jsVendor + 'ng-file-upload.min.js',
        jsVendor + 'jplayer/jquery.jplayer.min.js',
        jsVendor + 'jplayer/jplayer.playlist.min.js',
        jsVendor + 'snow/snowstorm.js',
     ], 'public/js/vendor.js')

    .scripts([
        'app.js',
        'ng-search.js',
        'ng-upload.js',
    ], 'public/js/app.js')


     .version(['css/app.css', 'css/vendor.css', 'js/vendor.js', 'js/app.js'])
});