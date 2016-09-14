<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;

class PlaylistsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index()
	{
		if (request()->has('page')) {
			$page = request()->get('page');
		} else {
			$page = 1;
		}

		$key = 'all_playlists_' . $page;

		$playlists = Cache::rememberForEver($key, function() {
			return Playlist::has('mList')->latest()->paginate(15);
		});

		// return $playlists;
		return view('playlists.index', compact('playlists'));
	}

	public function show($id, Request $request)
	{
		$key = '_playlist_show_' . $id;

		$data = Cache::rememberForEver($key, function() use ($id) {
			$playlist = Playlist::findOrFail($id);

		   $data = [
		   	'playlist' => $playlist,
		   	'musics' => $playlist->musics
		   ];

		   return $data;
		});

		if ($request->ajax()) {
			return $data['musics'];
		}

		return view('playlists.show', $data);
	}

	public function getCreate()
	{
		$user = auth()->user();

		$data = [
			'playlists' => $user->playlists()->latest()->get(),
		];

		return view('playlists.create', $data);
	}

	public function postCreate(CreatePlaylistRequest $request)
	{
		$user = auth()->user();

		$playlist = [
			'name' => $request->get('name'),
			'slug' => $request->get('name')
		];

		$user->playlists()->create($playlist);

		Cache::flush();

		return back();
	}

	public function edit(Playlist $playlist)
	{
		$user = auth()->user();

		$data = [
			'playlists' => $user->playlists()->latest()->get(),
			'playlist' => $playlist
		];

		return view('playlists.edit', $data);
	}

	public function update(UpdatePlaylistRequest $request, Playlist $playlist)
	{
		$data = [
			'name' => $request->get('name'),
			'slug' => $request->get('name')
		];

		$playlist->update($data);

		Cache::flush();

		return redirect(route('playlists.create'))
			->withMessage('Lis mizik la mete ajou av&egrave;k siks&egrave;.')
			->withStatus('success');
	}

	public function destroy(Playlist $playlist)
	{
		$this->authorize('destroy', $playlist);

		// $playlist->mList()->delete();
		$playlist->delete();

		Cache::forget('_playlist_show_' . $playlist->id);

		if (auth()->user()->admin) {
			return redirect(route('playlists.create'))
						->withMessage('Ou efase lis mizik la av&egrave;k siks&egrave;.')
						->withStatus('success');
		}

		return redirect(route('user.index'))
			->withMessage('Ou efase lis mizik la av&egrave;k siks&egrave;.')
			->withStatus('success');
	}

	public function listMusics(Playlist $playlist)
	{
		$user = auth()->user();

		$data = [
			'playlist' => $playlist,
			'musics' => $playlist->musics,
			'title' => $playlist->name
		];

		return view('playlists.list', $data);
	}

	public function postAddMusic(Playlist $playlist, Music $music)
	{
		if($playlist->mList()->whereMusicId($music->id)->first()) {
			return redirect($playlist->url)
				->withMessage('Ou ajoute mizik sa a nan lis la deja')
				->withStatus('warning');
		}

		$playlist->mList()->create([
			'music_id' => $music->id
		]);

		Cache::forget('_playlist_show_' . $playlist->id);

		return redirect($playlist->url)
			->withMessage("Ou ajoute $music->name nan lis mizik ou a av&egrave;k siks&egrave;.")
			->withStatus('success');
	}

	public function removeMusic(Playlist $playlist, Music $music)
	{
		$playlist->mList()->whereMusicId($music->id)->delete();

		Cache::flush();

		if (count($playlist->list)) {
			return redirect($playlist->url)
				->withMessage("Ou efase $music->name nan lis mizik ou a av&egrave;k siks&egrave;.")
				->withStatus('success');
		}

		return redirect(route('playlist.musics', ['id' => $playlist->id]))
			->withMessage("Ou efase $music->name nan lis mizik ou a av&egrave;k siks&egrave;.")
			->withStatus('success');
	}
}
