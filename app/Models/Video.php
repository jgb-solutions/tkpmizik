<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Model;

// use TNTSearch;
use TKPM;
use App\Traits\MP34Trait;

class Video extends Model
{
	use MP34Trait;

	protected $table = 'mp4s';
	protected $appends = ['url'];

	protected $fillable = [
		'name', 'youtube_id', 'image', 'user_id', 'description', 'category_id', 'slug'
	];

	public function getUrlAttribute()
	{
		return TKPM::route('video.show', ['id' => $this->id,'name' => $this->slug]);
	}

	public function getImageUrlAttribute()
	{
		return "https://img.youtube.com/vi/$this->youtube_id/hqdefault.jpg";
	}


	// // TNTSearch
	// public static function insertToIndex($mp4)
	// {
	//     TNTSearch::selectIndex("mp4s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->insert($mp4->toArray());
	// }

	// public static function deleteFromIndex($mp4)
	// {
	//     TNTSearch::selectIndex("mp4s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->delete($mp4->id);
	// }

	// public static function updateIndex($mp4)
	// {
	//     TNTSearch::selectIndex("mp4s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->update($mp4->id, $mp4->toArray());
	// }

	// public static function boot()
	// {
	// 	parent::boot();

	// 	static::created([__CLASS__, 'insertToIndex']);
	// 	static::updated([__CLASS__, 'updateIndex']);
	// 	static::deleted([__CLASS__, 'deleteFromIndex']);
	// }
}