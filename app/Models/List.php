<?php

namespace App\Models;

class List extends Model
{
	public function playlist()
	{
		return $this->belongsTo(Playlist::class);
	}
}