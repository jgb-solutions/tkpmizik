<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use Validator;
use App\Models\User;
use App\Models\Music;
use App\Models\Video;
use App\Models\Category;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		$data = [
			'admin' 	=> Auth::user(),

			'musics' => music::latest()->take(10)->get(),
			'musics_count' => music::count(),

			'videos' => video::latest()->take(10)->get(),
			'videos_count' => video::count(),

			'playlists' => Playlist::latest()->take(10)->get(),
			'playlists_count' => Playlist::count(),

			'users' => User::latest()->take(10)->get(),
			'users_count' => User::count(),

			'categories' => Category::orderBy('name')->take(10)->get(),
			'cats_count'	=> Category::count(),
			'title' => 'Administrasyon',
		];

		return view('admin.index', $data);
	}

	public function musics()
	{
		// $music = music::remember(120)->latest()->paginate(30);
		$music = music::latest()->paginate(30);

		// $music_count = music::remember(120)->count();
		$music_count = music::count();

		$title = 'Administrayon Mizik (' . $music_count . ')';

		return view('admin.music.index')
					->withTitle($title)
					->withmusics($music)
					->withmusicCount($music_count);
	}

	public function videos()
	{
		// $video = video::remember(120)->latest()->paginate(30);
		$video = video::latest()->paginate(30);

		// $video_count = music::remember(120)->count();
		$video_count = video::count();

		$title = 'Administrayon Videyo (' . $video_count . ')';

		return view('admin.video.index')
					->withTitle($title)
					->withvideos($video)
					->withvideoCount($video_count);
	}

	public function playlists()
	{
		// $video = video::remember(120)->latest()->paginate(30);
		$playlist = playlist::latest()->paginate(30);

		// $playlist_count = music::remember(120)->count();
		$playlist_count = playlist::count();

		$title = 'Administrayon Lis Mizik (' . $playlist_count . ')';

		return view('admin.playlists.index')
					->withTitle($title)
					->withplaylists($playlist)
					->withplaylistCount($playlist_count);
	}

	public function users()
	{
		$users = User::latest()->paginate(10);
		$userscount = User::count();

		return view('admin.users.index')
					->withTitle('Administrayon Itilizatè (' . $userscount . ')')
					->withUsers($users)
					->withUsersCount($userscount);
	}
}