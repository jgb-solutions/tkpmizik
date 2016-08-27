<?php

namespace App\Models;

class Playlist extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function lists()
	{
		return $this->hasMany(List::class);
	}

	public function musics()
	{
		$ids = $this->lists()->pluck('music_id');
		return Music::whereIn('id', $ids);
	}
}