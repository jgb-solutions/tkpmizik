<?php

namespace App\Models;

use TKPM;
use Illuminate\Support\Collection;

class Playlist extends Model
{
	protected $appends = ['url'];
	protected $fillable = ['name', 'slug', 'user_id', 'music_list_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function mList()
	{
		return $this->hasMany(MusicList::class);
	}

	public function getMusicsAttribute()
	{
		$ids = $this->mList()->pluck('music_id')->toArray();

		$musics = Music::find($ids, ['id', 'artist', 'name', 'image', 'slug']);

		$sorted = array_flip($ids);

		foreach ($musics as $music) {
			$sorted[$music->id] = $music;
		}

		$sorted = Collection::make(array_values($sorted));

		return $sorted;
	}

	public function getUrlAttribute()
	{
		return TKPM::route('playlist.show', ['id' => $this->id,'name' => $this->slug ]);
	}
}