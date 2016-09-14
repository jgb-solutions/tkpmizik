<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Vote;
use App\Models\Music;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AJAXController extends Controller
{
	public function postIndex(Request $request)
	{
		$query 	= $request->get('q');
		$fn 		= $request->get('fn');
		$id 		= $request->get('id');
		$obj 	= $request->get('obj');
		$ud		= $request->get('ud');
		$action = $request->get('action');

		// Vote system
		if ($fn == 'vote') {
			$fn = $fn . '_' . $ud;
			return $this->$fn($id, $obj, $action);
		}

		// default AJAX: Search...
		return $this->$fn($id, $obj, $query);
	}

	private function vpd_count($id, $o, $action = null)
	{
		$obj = $o == 'music' ? Music::find($id) : Video::find($id);
		$obj->views += 1;
		$obj->save();

		$data = [
			'views' 	=> $obj->views,
			'download' 	=> $obj->download,
			'play'		=> $o == 'music' ? $obj->play : ''
		];

		return $data;
	}

	private function search($id, $obj, $query)
	{
		if ( ! empty( $obj ) )
		{
			$fn = 'search' . $obj;
			return $this->$fn($query);
		}

		$musicresults = Music::published()
			->search($query)
			->orderBy('download', 'desc')
			->orderBy('play', 'desc')
			->rand() // get random rows from the DB
			->take( 10 )
			->get(['id', 'name', 'views', 'download', 'price']);

		$musicresults->each( function( $music )
		{
			$music->type = 'music';
			$music->icon = 'music';
		});

		$videoresults = Video::search($query)
			->orderBy('download', 'desc')
			->rand() // get random rows from the DB
			->take(10)
			->get(['id', 'views', 'name', 'download']);

		$videoresults->each( function( $video )
		{
			$video->type = 'video';
			$video->icon = 'video-camera';
		});

		$results = $musicresults->merge( $videoresults );
		$shuffle_results = $results->shuffle();

		return $shuffle_results;
	}

	private function searchMusic( $query )
	{
		$musicresults = Music::published()
						->search($query)
						->orderBy('play', 'desc')
						->orderBy('download', 'desc')
						->take( 20 )
						->get(['id', 'name', 'play', 'download', 'image', 'price']);

		$musicresults->each( function( $music )
		{
			$music->icon = 'music';
			$music->type = 'music';
		});

		return $musicresults;
	}

	private function searchVideo($query)
	{
		$videoresults = Video::search($query)
			->orderBy('play', 'desc')
			->orderBy('download', 'desc')
			->take(20)
			->get(['id', 'views', 'name', 'download']);

		$videoresults->each( function($video) {
			$video->icon = 'video-camera';
			$video->type = 'video';
		});

		return $videoresults;
	}

	// Vote Up and Down
	private function vote_up($id, $obj)
	{
		if ( Auth::check() ) {
			$user_id = Auth::user()->id;

			$vote = Vote::where('user_id', $user_id)
				->where('obj_id', $id)
				->where('obj', $obj)
				->first();

			if ($vote) {
				if ($vote->vote == 1) {
					return;
				}

				$vote->vote = 1;
				$vote->save();
			} else {
				Vote::create([
					'vote' 		=> 1,
					'obj_id' 	=> $id,
					'user_id' 	=> $user_id,
					'obj'		=> $obj
				]);
			}

			$obj = $obj == 'music' ? Music::find($id) : Video::find($id);
			// $obj = $obj::find($id);
			$obj->vote_up += 1;
			$obj->save();

			$arr = [
				'vote_up' => $obj->vote_up,
				'vote_down' => $obj->vote_down
			];

			return $arr;
		}
	}

	private function vote_down( $id, $obj )
	{
		if (Auth::check()) {
			$user_id = Auth::user()->id;

			$vote = Vote::where('user_id', $user_id)
				->where('obj_id', $id)
				->where('obj', $obj)
				->first();

			if ($vote) {
				if ( $vote->vote == -1 ) {
					return;
				}

				$vote->vote = -1;
				$vote->save();
			} else {
				Vote::create([
					'vote' 		=> -1,
					'obj_id' 	=> $id,
					'user_id' 	=> $user_id,
					'obj'		=> $obj
				]);
			}

			$obj = $obj == 'music' ? Music::find($id) : Video::find($id);
			// $obj = $obj::find($id);
			$obj->vote_down -= 1;
			$obj->save();

			$arr = [
				'vote_up' => $obj->vote_up,
				'vote_down' => $obj->vote_down
			];

			return $arr;
		}
	}

	private function vote_null( $id, $obj, $action )
	{
		if (Auth::check()) {
			$user_id = Auth::user()->id;

			$vote = Vote::where('user_id', $user_id)
				->where('obj_id', $id)
				->where('obj', $obj)
				->first()
				->delete();

			$obj = $obj == 'music' ? Music::find($id) : Video::find($id);
			// $obj = $obj::find($id);

			if ($action == 'up') {
				$obj->vote_up -= 1;
			} elseif ($action == 'down') {
				$obj->vote_down += 1;
			}

			$obj->save();

			$arr = [
				'vote_up' => $obj->vote_up,
				'vote_down' => $obj->vote_down
			];

			return $arr;

		}
	}
}