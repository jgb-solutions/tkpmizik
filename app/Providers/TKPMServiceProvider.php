<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class TKPMServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        	// view()->share('currentUser', Auth::user());
		view()->composer('modules.latest-musics', 'App\Http\ViewComposers\ViewComposer@latestMusicsModule');
		view()->composer('modules.latest-videos', 'App\Http\ViewComposers\ViewComposer@latestVideosModule');
		view()->composer('modules.latest-users', 'App\Http\ViewComposers\ViewComposer@latestUsersModule');
		view()->composer('modules.top-musics', 'App\Http\ViewComposers\ViewComposer@topMusicsModule');
		view()->composer('modules.top-videos', 'App\Http\ViewComposers\ViewComposer@topVideosModule');
		view()->composer('modules.top-users', 'App\Http\ViewComposers\ViewComposer@topUsersModule');
		view()->composer('cats.list-cats', 'App\Http\ViewComposers\ViewComposer@catModule');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register(){}
}