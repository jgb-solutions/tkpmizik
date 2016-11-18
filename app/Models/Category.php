<?php

namespace App\Models;

class Category extends Model
{
	protected $table = 'categories';

	protected $fillable = ['name', 'slug'];

	public $timestamps = false;

	public function musics()
	{
		return $this->hasMany(Music::class);
	}

	public function videos()
	{
		return $this->hasMany(Video::class);
	}

	public function getCountAttribute()
	{
		// return $this->musics()->remember(120)->count() + $this->videos()->remember(120)->count();
		return $this->musics()->count() + $this->videos()->count();
	}

	public function scopebyName($query)
	{
		$query->orderBy('name');
	}
}