<?php

namespace App\Models;

use Auth;
use TKPM;
use Watson\Rememberable\Rememberable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Rememberable;

   protected $fillable = [
      'name', 'username',
      'email', 'password',
      'admin', 'image',
      'avatar', 'telephone'
    ];

	protected $hidden = [
	    'password', 'remember_token',
	];

	protected $appends = ['url'];

	public function musics()
	{
	    return $this->hasMany(Music::class);
	}

	public function videos()
	{
		return $this->hasMany(Video::class);
	}

	public function votes()
	{
	 	return $this->hasMany(Vote::class);
	}

	public function bought()
	{
	    return $this->hasMany(MusicSold::class);
	}

	public function owns($obj)
	{
	    return $this->id == $obj->user_id;
	}

	public function ownerOrAdmin($obj)
	{
	    return $this->owns($obj) || $this->admin;
	}

	public function scopeByUsername($query, $username)
	{
	    $query->whereUsername($username);
	}

	public function playlists()
	{
		return $this->hasMany(Playlist::class);
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function getUrlAttribute()
	{
		return TKPM::profileLink($this->username, $this->id);
	}

	public function getFirstnameAttribute()
	{
		return TKPM::firstName($this->name);
	}

	public function getPaidAttribute()
	{
		return $this->attributes['price'] == 'paid';
	}
}