<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use Hash;
use TKPM;
use Cache;
use Image;
use Storage;
use Socialite;
use App\Models\Vote;
use App\Models\User;
use App\Models\Music;
use App\Models\Video;
use App\Models\Category;
use App\Models\MusicSold;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only([
			'getUser',
			'edit',
			'update',
			'delete',
			'boughtMusics',
		]);
	}

	public function index()
	{
		$data = [
			'users'	=> User::remember(60)->latest()->paginate(10),
			// 'users'	=> User::paginate(10),
			'title'	=> 'Navige Tout Itilizatè Yo'
		];

		return view('users.index')->with($data);
	}

	public function getLogin()
	{
		if (Auth::guest())
			return view('auth.login')
				->withTitle('Koneksyon');

		return redirect(route('user.index'));
	}

	public function postLogin(Request $request)
	{
		if (Auth::attempt($request->only('email', 'password'))) {
			$user = Auth::user();

			if ($user->admin) {
				return redirect()->intended(route('admin.index'))
					->withMessage('Byenvini ankò, ' . $user->firstName . '!')
					->withStatus('info');
			}

			return redirect()->intended(route('user.index'))
				->withMessage('Byenvini ankò, ' . $user->firstName . '!')
				->withStatus('info');
		} else {
			return redirect(route('login'))
				->withMessage(config('site.message.errors.login'))
				->withStatus('warning')
				->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();

		return redirect('/');
	}

	public function store(StoreUserRequest $request)
	{
		$user = User::create([
			'name' 		=> $request->get('name'),
			'password' 	=> $request->get('password'),
			'email' 		=> $request->get('email'),
			'telephone' => $request->get('telephone')
		]);

		Auth::login($user);

		$data = [
			'user' => $user,
			'subject' => 'Byenvini sou ' . config('site.name')
		];

		TKPM::sendMail('emails.user.welcome', $data, 'user');

		return redirect(route('user.index'))
			->withMessage('Byenvini, ' . $user->firstName)
			->withStatus('info');

	}

	public function getRegister()
	{
		if (Auth::check()) {
			return redirect(route('user.index'));
		}

		return view('auth.registration')
			->withTitle('Kreye yon kont');
	}

	public function getUser()
	{
		$user = Auth::user();
		$key = '_profile_user_data_' . $user->id;

		$data = Cache::get($key, function() use ($key, $user) {
			$data = [
				'musics' 				=> $user->musics()->latest()->take(5)->get(),
				'videos'				=> $user->videos()->latest()->take(5)->get(),
				'musiccount' 			=> $user->musics()->count(),
				'videocount' 			=> $user->videos()->count(),
				'musicViewsCount' 		=> $user->musics()->sum('views'),
				'videoViewsCount'		=> $user->videos()->sum('views'),
				'musicplaycount' 		=> $user->musics()->sum('play'),
				'musicdownloadcount' 	=> $user->musics()->sum('download'),
				'videodownloadcount' 	=> $user->videos()->sum('download'),
				'bought_count' 		=> $user->bought()->count(),
				'title'				=> 'Pwofil Ou',
				'user'				=> $user,
				'author'				=> $user->username ? '@' . $user->username . ' &mdash;' : $user->name . ' &mdash; '
			];

			Cache::put($key, $data, 120);

			return $data;
		});

		return view('user.profile', $data);
	}

	public function getUsermusics($usernameOrId = null)
	{
		$userRoute = $this->getUserFrom($usernameOrId);
		$user = $userRoute['user'];
		$route = $userRoute['route'];

		$user_musics = $user->musics();
		$user_videos = $user->videos();

		$first_name = ucwords( TKPM::firstName($user->name) );
		$title = 'Navige Tout Mizik ';
		$title .= Auth::check() ? 'Ou ' :  $first_name;
		$title .= ' Yo';

		$data = [
			'musics' 				=> $user->musics()->remember(5)->latest()->paginate(10),
			// 'musics' 				=> $user->musics()->latest()->paginate(10),
			'musiccount' 			=> $user_musics->count(),
			'videocount' 			=> $user_videos->count(),
			'musicViewsCount' 	=> $user_musics->sum('views'),
			'videoViewsCount'		=> $user_videos->sum('views'),
			'musicplaycount' 		=> $user_musics->sum('play'),
			'musicdownloadcount' => $user_musics->sum('download'),
			'videodownloadcount' => $user_videos->sum('download'),
			'bought_count' 		=> $user->bought()->count(),
			'first_name' 			=> $first_name,
			'title'					=> $title,
			'user'					=> $user,
			'route' 					=> $route
		];

		return view('user.music', $data);
	}

	public function getUservideos($usernameOrId = null)
	{
		$userRoute = $this->getUserFrom($usernameOrId);
		$user = $userRoute['user'];
		$route = $userRoute['route'];

		$user_musics = $user->musics();
		$user_videos = $user->videos();

		$first_name = ucwords(TKPM::firstName($user->name));
		$title = 'Navige Tout Videyo ';
		$title .= Auth::check() ? 'Ou ' :  $first_name;
		$title .= ' Yo';

		$data = [
			'videos' 				=> $user->videos()->remember(5)->latest()->paginate(10),
			// 'videos' 				=> $user->videos()->latest()->paginate(10),
			'musiccount' 			=> $user_musics->count(),
			'videocount' 			=> $user_videos->count(),
			'musicViewsCount' 	=> $user_musics->sum('views'),
			'videoViewsCount'		=> $user_videos->sum('views'),
			'musicplaycount' 		=> $user_musics->sum('play'),
			'musicdownloadcount' => $user_musics->sum('download'),
			'videodownloadcount' => $user_videos->sum('download'),
			'bought_count' 		=> $user->bought()->count(),
			'title'					=> $title,
			'first_name' 			=> $first_name,
			'user'					=> $user,
			'route'					=> $route
		];

		return view('user.video', $data);
	}

	public function playlists($usernameOrId = null)
	{
		$userRoute = $this->getUserFrom($usernameOrId);
		$user = $userRoute['user'];
		$route = $userRoute['route'];

		$user_musics = $user->musics();
		$user_videos = $user->videos();

		$first_name = ucwords(TKPM::firstName($user->name));
		$title = 'Navige Tout Lis Mizik ';
		$title .= Auth::check() ? 'Ou ' :  $first_name;
		$title .= ' Yo';

		$data = [
			'musiccount' 			=> $user_musics->count(),
			'videocount' 			=> $user_videos->count(),
			'musicViewsCount' 	=> $user_musics->sum('views'),
			'videoViewsCount'		=> $user_videos->sum('views'),
			'musicplaycount' 		=> $user_musics->sum('play'),
			'musicdownloadcount' => $user_musics->sum('download'),
			'videodownloadcount' => $user_videos->sum('download'),
			'bought_count' 		=> $user->bought()->count(),
			'title'					=> $title,
			'first_name' 			=> $first_name,
			'user'					=> $user,
			'route'					=> $route,
			'playlists' 			=> $user->playlists()->paginate(15),
		];

		return view('user.playlists', $data);
	}

	public function edit($id = null)
	{
		$user = $id ? User::findOrFail($id) : Auth::user();

		$title = 'Modifye pwofil ';
		$title .= $id ? $user->name : 'ou';

		return view('user.profile-edit', compact('title', 'user'));
	}

	public function update(UpdateUserRequest $request, $id = null)
	{
		$user = $id ? User::findOrFail($id) : Auth::user();

		$name 		= $request->get('name');
		$email 		= $request->get('email');
		$password 	= $request->get('password');
		$image 		= $request->file('image');
		$telephone	= $request->get('telephone');
		$username 	= $request->get('username');

		if (isset($image)) {
			$img_ext = $image->getClientOriginalExtension();
			$img_name 	= Str::random(8) . time() . '.' . $img_ext;

			$content = file_get_contents($request->file('image')->getRealPath());

			$img_success = Storage::disk('images')->put($img_name, $content);

			if ($img_success) {
				TKPM::image($img_name, 250, 250, 'thumbs');
				TKPM::image($img_name, 50, 50, 'thumbs/profile');

				if ($user->image) {
					Storage::disk('images')->delete([
						$user->image,
						'thumbs/' . $user->image,
						'thumbs/profile/' . $user->image,
					]);
				}
			}
		}

		if ( !empty($name) ) {
			$user->name = $name;
		}

		if ( !empty($email) ) {
			$user->email = $email;
		}

		if ( !empty($password) ) {
			$user->password = Hash::make($password );
		}

		if ( !empty($image) ) {
			$user->image = $img_name;
		}

		if ( !empty($telephone) ) {
			$user->telephone = $telephone;
		}

		if ( !empty($username) ) {
			$user->username = $username;
		}

		$user->save();

		Cache::flush();

		if (Auth::user()->admin)
			return redirect(route('admin.users'))
				->withMessage("Ou mete pwofil la ajou avèk siskè!")
				->withStatus('success');

		return redirect( route('user.index') )
			->withMessage('Ou mete pwofil ou ajou avèk siskè!')
			->withStatus('success');

	}

	public function getUserPublic($id)
	{
		$user = User::remember(60)->findOrFail($id);
		// $user = User::find($id);

		if ($user)
		{
			return $this->getUserData($user);
		}

		return redirect('/404');

	}

	public function getUserName($username)
	{
		$user = User::remember(60)->whereUsername($username)->first();
		// $user = User::whereUsername($username)->first();

		if ($user)
		{
			return $this->getUserData($user);
		}

		return redirect('/404');
	}

	private function getUserData($user)
	{
		$key = 'user_public_' . $user->id;

		if (Cache::has($key)) {
			$data = Cache::get($key);
		} else {
			$data = [
				'musics' 				=> $user->musics()->published()->latest()->take(10)->get(),
				'videos'				=> $user->videos()->latest()->take(10)->get(),
				'musiccount' 			=> $user->musics()->count(),
				'videocount' 			=> $user->videos()->count(),
				'musicViewsCount' 	=> $user->musics()->sum('views'),
				'videoViewsCount'		=> $user->videos()->sum('views'),
				'musicplaycount' 		=> $user->musics()->sum('play'),
				'musicdownloadcount' 	=> $user->musics()->sum('download'),
				'videodownloadcount' 	=> $user->videos()->sum('download'),
				'first_name' 		=> ucwords( TKPM::firstName($user->name) ),
				'bought_count' 		=> $user->bought()->count(),
				'title'				=> "Pwofil $user->name",
				'user'				=> $user,
				'author'			=> $user->username ? '@' . $user->username . ' &mdash;' : $user->name . ' &mdash; '
			];

			Cache::put($key, $data, 30);

		}

		return view('user.profile-public')->with($data);
	}

	public function delete(Request $request, User $user)
	{
		if ($user->admin) {
			return redirect(route('admin.users'))
				->withMessage('Ou pa ka efase administrat&egrave; a.')
				->withStatus('warning');
		}

		$loggedUser = Auth::user();

		if (!$loggedUser->admin) {
			if ($user->id !== $loggedUser->id) {
				return redirect(route('user.index'))
					->withMessage('Ou pa gen dwa efase kont sa a.')
					->withStatus('warning');
			}
		}

		$del = $request->get('del');

		$admin = $loggedUser->admin ? $loggedUser : User::whereAdmin(1)->first();

		if ( $loggedUser->admin ) {
			$musics = $user->musics()->get();
			$videos = $user->videos()->get();

			foreach ($musics as $music) {
				$music->user_id = $admin->id;
				$music->save();

				Vote::whereObj('music')
					->whereObjId($music->id )
					->whereUserId($user->id )
					->delete();
			}

			foreach ($videos as $video) {
				$video->user_id = $admin->id;
				$video->save();

				Vote::whereObj('video')
					->whereObjId($video->id )
					->whereUserId($user->id )
					->delete();
			}

			$boughts = musicSold::whereUserId($user->id)->get();
			$boughts->each(function($music) {
				$music->delete();
			});

			if ($user->image) {
				Storage::disk('images')->delete([
					$user->image,
					'thumbs/' . $user->image,
					'thumbs/profile/' . $user->image,
				]);
			}

			return redirect(route('admin.users'));
		}

		$musics = $user->musics()->get();
		$videos = $user->videos()->get();

		foreach ($musics as $music) {
			Vote::whereObj('music')
				->whereObjId($music->id )
				->whereUserId($user->id )
				->delete();

			if ($del ) {
				Storage::disk('musics')->delete([$music->mp3name]);
				Storage::disk('images')->delete([
					$music->image,
					'show/' . $music->image,
					'thumbs/' . $music->image,
					'thumbs/tiny/' . $music->image,
				]);
				$music->delete();
			} else {
				$music->user_id = $admin->id;
				$music->save();
			}

		}

		foreach ($videos as $video) {
			Vote::whereObj('video')
				->whereObjId($video->id )
				->whereUserId($user->id )
				->delete();

			if ($del ) {
				$video->delete();
			} else {
				$video->user_id = $admin->id;
				$video->save();
			}
		}

		$boughts = MusicSold::whereUserId($user->id)->get();
		$boughts->each(function($music) {
			$music->delete();
		});

		$user->delete();

		Auth::logout();

		Cache::flush();

		$aff = '';

		if ($del) {
			$aff = 'Mizik ak Videyo ou yo efase tou avèk siskè. Ou ka <a href="' . route('register') . '">kreye yon nouvo kont</a> nenpòt lè ou vle.';
		}

		return redirect('/')
			->withMessage('Kont ou an efase avèk sikè. <br>' . $aff)
			->withStatus('success');
	}

	public function boughtmusics()
	{
		$user 				= Auth::user();

		$musiccount 			= $user->musics()->count();
		$videocount 			= $user->videos()->count();
		$musicplaycount 		= $user->musics()->sum('play');
		$musicdownloadcount 	= $user->musics()->sum('download');
		$videodownloadcount 	= $user->videos()->sum('download');
		$musicViewsCount 		= $user->musics()->sum('views');
		$videoViewsCount 		= $user->videos()->sum('views');

		$firstname 			= TKPM::firstName($user->name);

		$bought_musics = $user->bought()->get(['music_id']);
		$musics = [];
		$music_ids = [];

		foreach ($bought_musics as $bought_music) {
			$music_ids[] = $bought_music->music_id;
		}

		if ($music_ids) {
			$musics = music::find($music_ids)->reverse();
		}

		$bought_musics_count = $bought_musics->count();

		$title = "Ou achte $bought_musics_count mizik";

		$data = [
			'title' => $title,
			'musics' => $musics,
			'first_name' => $firstname,
			'musiccount' => $musiccount,
			'videocount' => $videocount,
			'musicplaycount' => $musicplaycount,
			'musicdownloadcount' => $musicdownloadcount,
			'videodownloadcount' => $videodownloadcount,
			'musicViewsCount' => $musicViewsCount,
			'videoViewsCount' => $videoViewsCount,
			'user' => $user,
			'bought_count' => $bought_musics_count
		];
		return view('user.bought-music', $data);
	}


	public function facebookRedirect()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function handleFacebookCallback()
	{
		return $this->handleProviderCallback('facebook');
	}

	public function twitterRedirect()
	{
		return Socialite::driver('twitter')->redirect();
	}

	public function handleTwitterCallback()
	{
		return $this->handleProviderCallback('twitter');
	}

	public function handleProviderCallback($provider)
	{
		try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
        	// $url = $provider . 'Redirect';
         	// return $this->$url();
        	return redirect(route('login'))
				->withMessage(config('site.message.errors.login'))
				->withStatus('warning');
        }

        // dd($user);

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->intended(route('user.index'))
        	->withMessage('Byenvini ankò, ' . TKPM::firstName($authUser->name) . '!')
				->withStatus('info');
	}

	private function findOrCreateUser($user)
    {
    	$authUser = User::whereEmail($user->email)->first();

        if ($authUser) {
            return $authUser;
        }

        return User::create([
            'name' => $user->name,
            'username' => $user->nickname ?: $user->id,
            'email' => $user->email,
            'avatar' => $user->avatar
        ]);
    }

   private function getUserFrom($usernameOrId) {
   	$route = [];

    	if (isset($usernameOrId)) {
			if (is_numeric($usernameOrId)) {
				$user = User::findOrFail($usernameOrId);
				$route = ['id' => $usernameOrId];
			} else if (is_string($usernameOrId)) {
				$user = User::byUsername($usernameOrId)->firstOrFail();
				$route = ['username' => $usernameOrId];
			}
		} else {
			$user = auth()->user();
		}

		return $data = [
			'user' => $user,
			'route' => $route
		];
   }
}