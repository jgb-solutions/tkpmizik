<?php

// Pages
Route::get('/', ['as'=>'home','uses'=>'PagesController@index']);
Route::get('dekouvri', ['as'=>'discover','uses'=>'PagesController@discover']);
Route::get('dekouvri/mizik', ['as'=>'discover.music','uses'=>'PagesController@discoverMusic']);
Route::get('dekouvri/videyo', ['as'=>'discover.video','uses'=>'PagesController@discoverVideo']);
Route::get('lis', ['as'=>'playlists','uses' => 'PlaylistsController@index']);
Route::get('lis/kreye', ['as'=>'playlists.create','uses' => 'PlaylistsController@getCreate']);
Route::post('lis/kreye', ['as'=>'playlist.create','uses' => 'PlaylistsController@postCreate']);
Route::get('lis/{playlist}/modifye', ['as'=>'playlist.edit','uses' => 'PlaylistsController@edit']);
Route::put('lis/{playlist}/modifye', ['as'=>'playlist.edit','uses' => 'PlaylistsController@update']);
Route::delete('lis/{playlist}', ['as'=>'playlist.delete','uses' => 'PlaylistsController@delete']);
Route::get('lis/{id}/{slug?}', ['as'=>'playlist.show','uses' => 'PlaylistsController@show']);
Route::get('/cheche', ['as' => 'search','uses' => 'SearchController@getIndex']);

// Registration / Login
Route::get('koneksyon', ['as' => 'login','uses' => 'UsersController@getLogin']);
Route::post('koneksyon', ['as' => 'login','uses' => 'UsersController@postLogin']);
Route::get('koneksyon/facebook', ['as'=>'facebook.login','uses'=>'UsersController@facebookRedirect']);
Route::get('koneksyon/twitter', ['as'=>'twitter.login','uses' => 'UsersController@twitterRedirect']);
Route::get('koneksyon/facebook/callback', 'UsersController@handleFacebookCallback');
Route::get('koneksyon/twitter/callback', 'UsersController@handleTwitterCallback');
Route::get('dekoneksyon', ['as' => 'logout','uses' => 'UsersController@getLogout']);
Route::get('anrejistre', ['as' => 'register','uses' => 'UsersController@getRegister']);
Route::post('anrejistre', ['as'=>'post.register','uses' => 'UsersController@store']);

// Password resets routes
Route::get('modpas/reyinisyalize/{token?}',['as' => 'password.reset.init','uses' => 'Auth\PasswordController@showResetForm']);
Route::post('modpas/imel', ['as' => 'password.reset.email','uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('modpas/reyinisyalize', ['as' => 'password.reset.process','uses' => 'Auth\PasswordController@reset']);

// Feed routes
Route::get('feed/mizik', ['as' => 'feed.music','uses' => 'FeedController@music']);
Route::get('feed/videyo', ['as'=>'feed.video','uses' =>'FeedController@video']);

// Users routes
Route::get('tout-itilizate-yo', ['as' => 'users','uses' => 'UsersController@index']);
Route::group(['prefix' => 'kont','as' =>'user.'], function() {
	Route::get('/', [		'as' => 'index','uses' => 'UsersController@getUser']);
	Route::get('mizik', ['as' => 'music','uses' => 'UsersController@getUserMusics']);
	Route::get('videyo', ['as' => 'video','uses' => 'UsersController@getUserVideos']);
	Route::get('modifye/{user?}', ['as' => 'edit','uses' => 'UsersController@edit']);
	Route::put('modifye/{user?}', ['as' => 'update','uses' => 'UsersController@update']);
	Route::delete('efase/{user}', ['as' => 'delete','uses' => 'UsersController@delete']);
	Route::get('mizik-mwen-achte', ['as' => 'bought','uses' => 'UsersController@boughtMusics']);
});
Route::get('@{id}', ['as' => 'user.public','uses' => 'UsersController@getUserPublic'])
->where('id', '[0-9]+');
Route::get('@{username}', ['as' => 'user.public','uses' => 'UsersController@getUserName']);
Route::get('@{id}/mizik', ['as' => 'user.public.music','uses' => 'UsersController@getUserMusics'])
->where('id', '[0-9]+');
Route::get('@{username}/mizik', ['as' => 'user.public.music','uses' => 'UsersController@getUserMusics']);
Route::get('@{id}/videyo', ['as' => 'user.public.video','uses' => 'UsersController@getUserVideos'])
->where('id', '[0-9]+');
Route::get('@{username}/videyo', ['as' => 'user.public.video','uses' => 'UsersController@getUserVideos']);


// Categories routes
Route::group(['prefix' => 'kategori'], function() {
	Route::get('{slug}', [	'as' => 'cat.show','uses' => 'CategoryController@show']);
	Route::get('{slug}/mizik', [	'as' => 'cat.music','uses' => 'CategoryController@music']);
	Route::get('{slug}/videyo', [	'as' => 'cat.video','uses' => 'CategoryController@video']);
});

// Musics routes
Route::get('mizik', ['as' => 'music','uses' => 'MusicController@index']);
Route::get('mizik/{music}/modifye',['as' => 'music.edit','uses' => 'MusicController@edit']);
Route::put('mizik/{music}/modifye',['as' => 'music.update','uses' => 'MusicController@update']);
Route::get('mizik/{id}/{slug?}',['as' => 'music.show','uses' => 'MusicController@show'])
->where('music', '[0-9]+');
Route::get('telechaje/mizik/{music}', ['as' => 'music.get','uses' => 'MusicController@getMusic'])
->where('music', '[0-9]+');
Route::delete('efase/mizik/{music}', ['as' => 'music.delete','uses' => 'MusicController@destroy']);
Route::get('mete/mizik', ['as' => 'music.upload','uses' => 'MusicController@upload']);
Route::get('jwe/mizik/{music}', ['as' => 'music.play','uses' => 'MusicController@play'])
->where('music', '[0-9]+');
Route::get('achte/mizik', ['as' => 'buy.list', 'uses' => 'MusicController@listBuy']);
Route::get('achte/mizik/{music}', ['as' => 'buy.show', 'uses' => 'MusicController@getBuy'])
->where('music', '[0-9]+');
Route::post('achte/mizik/{music}', ['as' => 'buy.post','uses' => 'MusicController@postBuy'])
->where('music', '[0-9]+');
Route::post('mizik', ['as' => 'music.store', 'uses' => 'MusicController@store']);

// Video routes
Route::get('videyo', ['as' => 'video','uses' => 'VideoController@index']);
Route::get('videyo/{video}/modifye',['as' => 'video.edit','uses' => 'VideoController@edit'])
->where('id', '[0-9]+');
Route::put('videyo/{video}/modifye',['as' => 'video.update','uses' => 'VideoController@update'])
->where('id', '[0-9]+');
Route::get('videyo/{id}/{slug?}', ['as' => 'video.show','uses' => 'VideoController@show'])
->where('id', '[0-9]+');
Route::get('telechaje/videyo/{id}', ['as' => 'video.get','uses' => 'VideoController@getVideo'])
->where('id', '[0-9]+');
Route::delete('efase/videyo/{video}', ['as' => 'video.delete','uses' => 'VideoController@destroy']);
Route::get('mete/videyo', ['as' => 'video.upload','uses' => 'VideoController@upload']);
Route::post('videyo', ['as' => 'video.store','uses' => 'VideoController@store']);

// Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::get('kategori', ['as' => 'cat','uses' => 'CategoryController@getCreate']);
	Route::post('kategori', [	'as' => 'cat','uses' => 'CategoryController@postCreate']);
	Route::delete('kategori/efase/{id}', [	'as' => 'cat.delete','uses' => 'CategoryController@delete']);
	Route::get('kategori/{category}/modifye', [	'as' => 'cat.edit','uses' => 'CategoryController@edit'])
	->where('id', '[0-9]+');
	Route::put('kategori/modifye', [	'as' => 'cat.update','uses' => 'CategoryController@update']);
	Route::get('/', [	'as' => 'index','uses' => 'AdminController@index']);
	Route::get('mizik', [	'as' => 'music','uses' => 'AdminController@music']);
	Route::get('videyo', [	'as' => 'video','uses' => 'AdminController@video']);
	Route::get('lis', [	'as' => 'playlists','uses' => 'AdminController@playlists']);
	Route::get('itilizate', ['as' => 'users','uses' => 'AdminController@users']);
});

Route::get('test', function() {
	// $faker = Faker\Factory::create();
	// foreach (range(1, 10) as $value) {
	// 	$name = $faker->name;

	// 	App\Models\Playlist::create([
	// 		'name' => $name,
	// 		'slug' => str_slug($name),
	// 		'user_id' => 15
	// 	]);
	// }

	$playlist = App\Models\Playlist::first();

	// foreach (range(139, 141) as $value) {
	// 	$playlist->list()->create([
	// 		'music_id' => $value
	// 	]);
	// }

	return $playlist;
	// $user = App\Models\User::find(15);
	// $user->playlists()->create([]); // create playlists with the user id

	// $playlist->list()->create([]); // create music list with playlist id
});