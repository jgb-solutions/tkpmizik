<?php

namespace App\Models;
// use Illuminate\Auth\UserTrait;
// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableTrait;
// use Illuminate\Auth\Reminders\RemindableInterface;

// class User extends Eloquent implements UserInterface, RemindableInterface {

//     use UserTrait, RemindableTrait;

// }

use Illuminate\Foundation\Auth\User as Authenticatable;
use Watson\Rememberable\Rememberable;
use Auth;

class User extends Authenticatable
{
    use Rememberable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'admin', 'image', 'avatar', 'telephone'
    ];

	  /**
	   * The attributes that should be hidden for arrays.
	   *
	   * @var array
	   */
	protected $hidden = [
	    'password', 'remember_token',
	];

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

	public static function owns($obj)
	{
	    return Auth::user()->id == $obj->user_id;
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
}