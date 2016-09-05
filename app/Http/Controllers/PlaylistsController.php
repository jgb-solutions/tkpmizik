<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Playlist;

class PlaylistsController extends Controller
{
	public function index()
	{
		$playlists = Playlist::latest()->paginate(15);
		// return $playlists;
		return view('playlists.index', compact('playlists'));
	}

	public function show($id)
	{
		$key = '_playlist_show_' . $id;

		$data = Cache::remember($key, 120, function() use ($id) {
			$playlist = Playlist::findOrFail($id);

		   $data = [
		   	'playlist' => $playlist,
		   	'musics' => $playlist->musics
		   ];

		   return $data;
		});

		// return $data;

		return view('playlists.show', $data);
	}

	public function getCreate()
	{
		
	}

	public function postCreate()
	{
		
	}

	public function edit()
	{
		
	}

	public function update()
	{
		
	}

	public function delete()
	{
		
	}
}
