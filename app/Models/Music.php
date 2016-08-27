<?php

namespace App\Models;
// use Illuminate\Database\Eloquent\Model;

// use TNTSearch;
use App\Traits\MP34Trait;

class Music extends Model
{
	use MP34Trait;

	protected $table = 'mp3s';

	protected $fillable = [
		'name', 'mp3name', 'image', 'user_id', 'description', 'category_id', 'size', 'slug'
	];

	public function scopePublished($query)
	{
		$query->wherePublish(1);
	}

	public function scopePaid($query)
	{
		$query->wherePrice('paid');
	}

	public function scopeByPlay($query)
	{
		$query->orderBy('play', 'desc');
	}

	// // TNTSearch
	// public static function insertToIndex($mp3)
	// {
	//     TNTSearch::selectIndex("mp3s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->insert($mp3->toArray());
	// }

	// public static function deleteFromIndex($mp3)
	// {
	//     TNTSearch::selectIndex("mp3s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->delete($mp3->id);
	// }

	// public static function updateIndex($mp3)
	// {
	//     TNTSearch::selectIndex("mp3s.index");
	//     $index = TNTSearch::getIndex();
	//     $index->update($mp3->id, $mp3->toArray());
	// }

	// public static function boot()
	// {
	// 	parent::boot();

	// 	static::created([__CLASS__, 'insertToIndex']);
	// 	static::updated([__CLASS__, 'updateIndex']);
	// 	static::deleted([__CLASS__, 'deleteFromIndex']);
	// }
}