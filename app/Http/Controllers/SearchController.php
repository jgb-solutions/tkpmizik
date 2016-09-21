<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use TeamTNT\TNTSearch\TNTSearch;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	protected $request = '';

	public function __construct(Request $request) {
		$this->request = $request;
	}

	public function getIndex() {
		$term = $this->request->get('q');
		$type = $this->request->get('type');

		if (isset($type) && ! empty($type)) {
			$fn = 'search' . $type;
			return $this->$fn($term);
		}

		// $music_res = $this->search('musics', $query);
		$music_res = null;
		$music_results = Music::search($music_res['ids'], $term)
			->get(['id', 'play', 'download', 'views', 'artist', 'name', 'image']);

		$music_results = $this->prepare('music', $music_results);

		// $video_res = $this->search('videos', $query);
		$video_res = null;

		$video_results = Video::search($video_res['ids'], $term)
			->get(['id', 'download', 'views', 'artist', 'name', 'image', 'youtube_id']);

		$video_results = $this->prepare('video', $video_results);


		$results = $music_results->merge($video_results)->shuffle();

		if ($this->request->ajax()) {
			return $results;
		}

		$data = [
			'results' => $results,
			'query' => $term,
			'title'	=> 'Rezilta pou: ' . $term
		];

		return view('search.index', $data);
	}



	public function searchmusic($term)
	{
		// $music_res = $this->search('musics', $term);
		$music_res = null;

		$musics = Music::search($music_res['ids'], $term)
			// ->get(['id', 'name', 'play', 'download', 'views', 'image']);
			->paginate(20, ['id', 'name', 'play', 'views', 'artist', 'download'] );

		$music_results = $this->prepare('music', $musics);


		if ($this->request->ajax()) {
			return $musics;
		}


		$data = [
			'musics' => $musics,
			'query' => $term,
			'title' => $term
		];

		return view('search.music', $data);
	}



	public function searchvideo($term)
	{
		// $video_res = $this->search('videos', $term);
		$video_res = null;

		$videos = Video::search($video_res['ids'], $term)
			->paginate( 20, ['id', 'name', 'download', 'views', 'artist']);

		$videos = $this->prepare('video', $videos);

		if ($this->request->ajax() ) {
			return $videos;
		}

		$data = [
			'videos' => $videos,
			'query' => $term,
			'title' => $term
		];

		return view('search.video', $data);
	}

	private function search($index, $term, $howmany = 200)
	{
		$tnt = new TNTSearch;

		$tnt->loadConfig([
	        		"storage"  => storage_path(),
	   ]);

		$tnt->selectIndex("{$index}.index");
		$tnt->asYouType = true;

	   dd($tnt->search($term, $howmany));
	}

	private function prepare($type, $collection)
	{
		switch ($type) {
			case 'music':
				$icon = 'music';
			break;

			case 'video':
				$icon = 'video-camera';
			break;
		}

		$collection->each(function($obj) use ($icon, $type) {
			$obj->icon = $icon;
			$obj->type = $type;
			$obj->url = url(route("$type.show", ['id'=>$obj->id, 'slug'=>$obj->slug]));
		});

		return $collection;
	}
}