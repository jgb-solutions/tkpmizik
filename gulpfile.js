var elixir = require('laravel-elixir');

elixir(function(mix) {
     mix
     // .copy('vendor/bower/angular/angular.js', 'resources/assets/js/vendor/angular.js')
     // .copy('vendor/bower/jquery/dist/jquery.min.js', 'resources/assets/js/vendor/jquery.js')

     .less(['style.less', 'log-reg.less'], 'public/css/app.css')

     	.styles([
     		'vendor/bootstrap.min.css',
     		'vendor/font-awesome.min.css',
     		'vendor/360player.css',
		'vendor/360player-visualization.css',
     	], 'public/css/vendor.css')

     	.scripts([
         	'vendor/jquery.js',
            'vendor/angular.js',
         	'vendor/form.min.js',
         	'vendor/bootstrap.min.js',
		'vendor/lazyload.min.js',
		'vendor/soundmanager2.js',
		'vendor/berniecode-animator.js',
		'vendor/360player.js',
		'app.js',
		'ng-search.js',
     ], 'public/js/app.js')

     // .version(['css/app.css', 'js/all.js'])
});