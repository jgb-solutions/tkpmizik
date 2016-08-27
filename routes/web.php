<?php
Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@index'
]);

Route::get('404', [
	'as' => '404',
	'uses' => 'PagesController@notFound'
]);

Route::get('dekouvri', [
	'as' => 'discover',
	'uses' => 'PagesController@discover'
]);

Route::get('dekouvri/mizik', [
	'as' => 'discover.music',
	'uses' => 'PagesController@discoverMusic'
]);

Route::get('dekouvri/videyo', [
	'as' => 'discover.video',
	'uses' => 'PagesController@discoverVideo'
]);

Route::get('lis', [
	'as' => 'playlists',
	'uses' => 'PagesController@playlists'
]);

Route::get('/cheche', [
	'as' => 'search',
	'uses' => 'SearchController@getIndex'
]);

Route::get('koneksyon', [
	'as' => 'login',
	'uses' => 'UsersController@getLogin'
]);

Route::post('koneksyon', [
	'as' => 'login',
	'uses' => 'UsersController@postLogin'
]);

Route::get('koneksyon/facebook', [
	'as' => 'facebook.login',
	'uses' => 'UsersController@facebookRedirect'
]);
Route::get('koneksyon/twitter', [
	'as' => 'twitter.login',
	'uses' => 'UsersController@twitterRedirect'
]);

Route::get('koneksyon/facebook/callback', 'UsersController@handleFacebookCallback');
Route::get('koneksyon/twitter/callback', 'UsersController@handleTwitterCallback');

Route::get('dekoneksyon', [
	'as' => 'logout',
	'uses' => 'UsersController@getLogout'
]);

Route::get('anrejistre', [
	'as' => 'register',
	'uses' => 'UsersController@getRegister'
]);

Route::post('anrejistre', [
	'as' => 'post.register',
	'uses' => 'UsersController@store'
]);

// Feed routes
Route::get('feed/mizik', [
	'as' => 'feed.music',
	'uses' => 'FeedController@music'
]);

Route::get('feed/videyo', [
	'as' => 'feed.video',
	'uses' => 'FeedController@video'
]);

// Users routes
Route::get('tout-itilizate-yo', [
	'as' => 'users',
	'uses' => 'UsersController@index'
]);

Route::group(['prefix' => 'kont','as' =>'user.'], function() {
		Route::get('/', [
			'as' => 'index',
			'uses' => 'UsersController@getUser'
		]);

		Route::get('mizik', [
			'as' => 'music',
			'uses' => 'UsersController@getUserMusics'
		]);

		Route::get('videyo', [
			'as' => 'video',
			'uses' => 'UsersController@getUserVideos'
		]);

		Route::get('modifye/{id?}', [
			'as' => 'edit',
			'uses' => 'UsersController@edit'
		]);

		Route::put('modifye/{id?}', [
			'as' => 'update',
			'uses' => 'UsersController@update'
		]);

		Route::delete('efase/{user}', [
			'as' => 'delete',
			'uses' => 'UsersController@delete'
		])->where('id', '[0-9]+');

		Route::get('mizik-mwen-achte', [
			'as' => 'bought',
			'uses' => 'UsersController@boughtMusics'
		]);
	}
);

Route::get('@{id}', [
	'as' => 'user.public',
	'uses' => 'UsersController@getUserPublic'
])->where('id', '[0-9]+');

Route::get('@{username}', [
	'as' => 'user.public',
	'uses' => 'UsersController@getUserName'
]);

Route::get('@{id}/mizik', [
	'as' => 'user.public.music',
	'uses' => 'UsersController@getUserMusics'
])->where('id', '[0-9]+');

Route::get('@{username}/mizik', [
	'as' => 'user.public.music',
	'uses' => 'UsersController@getUserMusics'
]);

Route::get('@{id}/videyo', [
	'as' => 'user.public.video',
	'uses' => 'UsersController@getUserVideos'
])->where('id', '[0-9]+');

Route::get('@{username}/videyo', [
	'as' => 'user.public.video',
	'uses' => 'UsersController@getUserVideos'
]);

// Password resets routes
Route::get('modpas/reyinisyalize/{token?}', [
	'as' => 'password.reset.init',
	'uses' => 'Auth\PasswordController@showResetForm'
]);

Route::post('modpas/imel', [
	'as' => 'password.reset.email',
	'uses' => 'Auth\PasswordController@sendResetLinkEmail'
]);

Route::post('modpas/reyinisyalize', [
	'as' => 'password.reset.process',
	'uses' => 'Auth\PasswordController@reset'
]);

// Categories routes
Route::group(['prefix' => 'kategori'], function()
{
	Route::get('{slug}', [
		'as' => 'cat.show',
		'uses' => 'CategoryController@show'
	]);
	Route::get('{slug}/mizik', [
		'as' => 'cat.music',
		'uses' => 'CategoryController@music'
	]);
	Route::get('{slug}/videyo', [
		'as' => 'cat.video',
		'uses' => 'CategoryController@video'
	]);
});

// Musics routes
Route::get('mizik', [
	'as' => 'music',
	'uses' => 'MusicController@index'
]);

Route::get('mizik/{id}/modifye',[
	'as' => 'music.edit',
	'uses' => 'MusicController@edit'
])->where('id', '[0-9]+');

Route::put('mizik/{id}/modifye',[
	'as' => 'music.update',
	'uses' => 'MusicController@update'
])->where('id', '[0-9]+');

Route::get('mizik/{id}/{slug?}',[
	'as' => 'music.show',
	'uses' => 'MusicController@show'
])->where('id', '[0-9]+');

Route::get('telechaje/mizik/{id}', [
	'as' => 'music.get',
	'uses' => 'MusicController@getMusic'
])->where('id', '[0-9]+');

Route::delete('efase/mizik/{music}', [
	'as' => 'music.delete',
	'uses' => 'MusicController@destroy'
]);

Route::get('mete/mizik', [
	'as' => 'music.upload',
	'uses' => 'MusicController@upload'
]);

Route::get('jwe/mizik/{id}', [
	'as' => 'music.play',
	'uses' => 'MusicController@play'
])->where('id', '[0-9]+');

Route::get('achte/mizik', [
	'as' => 'buy.list',
	'uses' => 'MusicController@listBuy'
]);

Route::get('achte/mizik/{id}', [
	'as' => 'buy.show',
	'uses' => 'MusicController@getBuy'
])->where('id', '[0-9]+');

Route::post('achte/mizik/{id}', [
	'as' => 'buy.post',
	'uses' => 'MusicController@postBuy'
])->where('id', '[0-9]+');

Route::post('mizik', [
	'as' => 'music.store',
	'uses' => 'MusicController@store'
]);


// Video routes
Route::get('videyo', [
	'as' => 'video',
	'uses' => 'VideoController@index'
]);

Route::get('videyo/{id}/modifye',[
	'as' => 'video.edit',
	'uses' => 'VideoController@edit'
])->where('id', '[0-9]+');

Route::put('videyo/{id}/modifye',[
	'as' => 'video.update',
	'uses' => 'VideoController@update'
])->where('id', '[0-9]+');

Route::get('videyo/{id}/{slug?}', [
	'as' => 'video.show',
	'uses' => 'VideoController@show'
])->where('id', '[0-9]+');

Route::get('telechaje/videyo/{id}', [
	'as' => 'video.get',
	'uses' => 'VideoController@getVideo'
])->where('id', '[0-9]+');

Route::delete('efase/videyo/{video}', array(
	'as' => 'video.delete',
	'uses' => 'VideoController@destroy'
));

Route::get('mete/videyo', [
	'as' => 'video.upload',
	'uses' => 'VideoController@upload'
]);

Route::post('videyo', [
	'as' => 'video.store',
	'uses' => 'VideoController@store'
]);


// Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::get('kategori', [
		'as' => 'cat',
		'uses' => 'CategoryController@getCreate'
	]);

	Route::post('kategori', [
		'as' => 'cat',
		'uses' => 'CategoryController@postCreate'
	]);

	Route::delete('kategori/efase/{id}', [
		'as' => 'cat.delete',
		'uses' => 'CategoryController@delete'
	]);

	Route::get('kategori/{id}/modifye', [
		'as' => 'cat.edit',
		'uses' => 'CategoryController@edit'
	])->where('id', '[0-9]+');

	Route::put('kategori/modifye', [
		'as' => 'cat.update',
		'uses' => 'CategoryController@update'
	]);

	Route::get('/', [
		'as' => 'index',
		'uses' => 'AdminController@index'
	]);
	Route::get('mizik', [
		'as' => 'music',
		'uses' => 'AdminController@music'
	]);
	Route::get('itilizate', [
		'as' => 'users',
		'uses' => 'AdminController@users'
	]);
	Route::get('videyo', [
		'as' => 'video',
		'uses' => 'AdminController@video'
	]);
});

// AJAX routes
Route::post('ajax', 'AJAXController@postIndex');

// test
Route::get('cache', function()
{
	// return Cache::get('voteMP47');
});

Route::get('logreg', function()
{
	return view('auth.logreg');
});

Route::get('whatsapp', function()
{
	 // $number = '50936478199'; # Number with country code
  //   $type = 'sms'; # This can be either sms or voice

  //   $response = WhatsapiTool::requestCode($number, $type);

    // $code = '471097'; # Replace with received code  

    // $response = WhatsapiTool::registerCode($number, $code);

    // dd($response);

	 // Retrieve user data from database, web service, and so on.
    // Dummy method, fake data.
    // $user = new stdClass;
    // $user->name = 'jean gerard';
    // $user->phone = '50941607569';

    // $message = "Hello $user->name and welcome to our site";

    // $messages = Whatsapi::send($message, function($send) use ($user) {
    //     $send->to($user->phone);

    //     // Add an audio file
    //     // $send->audio('http://itnovado.com/example.mp3');

    //     // Add an image file
    //     // $send->image('http://itnovado.com/example.jpg', 'Cool image');

    //     // Add a video file
    //     // $send->video('http://itnovado.com/example.mp4', 'Fun video');

    //     // Add a location (Longitude, Latitude)
    //     // $send->location(-89.164138, 19.412405, 'Itnovado Location');

    //     // Add a VCard
    //     // $vcard = new Xaamin\Whatsapi\Media\VCard();

    //     // $vcard->set('data', array(
    //     //     'first_name' => 'John',
    //     //     'last_name' => 'Doe',
    //     //     'tel' => '9611111111',
    //     //     ));

    //     // $send->vcard('Xaamin', $vcard);

    //     // Add new text message
    //     $send->message('Thanks for subscribe');
    // });

    // dd($messages);
	$messages = $messages = Whatsapi::getNewMessages();

    if($messages)
    {
        foreach($messages as $message)
        {
            echo $message;
        }
    }
});