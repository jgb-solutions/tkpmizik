<?php

namespace App\Models;

class MusicSold extends Model
{
	protected $table = 'sold_mp3s';

	public $timestamps = false;

	protected $fillable = ['mp3_id', 'user_id'];
}