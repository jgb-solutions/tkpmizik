<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Music;
use App\Models\Video;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function index()
	{
		$data = Cache::get('page.home', function() {
			$data = [
				'featuredMusics' => Music::featured()
										->published()
										->take(12)
										->get(),
				'featuredVideos' => Video::featured()->take(12)->get(),
				'lastMonthTopMusics'  => Music::lastMonth()
											->popular()
											->byPlay()
											->take(12)
											->get(),
				'lastMonthTopVideos'  => Video::lastMonth()
											->popular()
											->take(12)
											->get(),
			];

			Cache::put('page.home', $data, 120);

			return $data;
		});

		return view('home', $data);
	}

	public function notFound()
	{
		return view('errors.404');
	}

	public function discover()
	{
		$data = [
			'musics' => Music::published()
							->rand()
							->take(12)
							->get(),
			'videos' => Video::rand()
							->take(12)
							->get()
		];

		return view('pages.discover.index', $data);
	}

	public function discoverMusic()
	{
		$musics = Music::remember(120)
						->published()
						->rand()
						->paginate(20);

		return view('pages.discover.music', compact('musics'));
	}

	public function discoverVideo()
	{
		$videos = Video::remember(120)
						->rand()
						->paginate(20);

		return view('pages.discover.video', compact('videos'));
	}

	public function playLists()
	{
		// $musics = Music::latest()->published()->take(8)->get();

		// return view('pages.discover', compact('musics'));
	}
}