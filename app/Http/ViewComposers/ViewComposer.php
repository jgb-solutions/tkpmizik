<?php

namespace App\Http\ViewComposers;


Use Auth;
use Cache;
use App\Models\User;
use App\Models\Music;
use App\Models\Video;
use App\Models\Category;
use Illuminate\View\View;

class ViewComposer
{
	public function catModule(View $view)
	{
		$cats = Cache::get('categories', function() {
			$allCats = Category::orderBy('name')->get();
			$filtered = $allCats->filter(function($cat) {
				return $cat->count > 0;
			});

			Cache::forever('categories', $filtered);

			return $filtered;
		});

		$view->with(compact('cats'));
	}

	public function latestMusicsModule(View $view)
	{
		$musics = Music::remember(120)->latest()->take(5)->get();
		// $musics = Music::latest()->take(5)->get();

		$view->with(compact('musics'));
	}

	public function latestVideosModule(View $view)
	{
  		$videos = Video::remember(120)->latest()->take(5)->get();
  		// $videos = Video::latest()->take(5)->get();

		$view->with(compact('videos'));
	}

	public function latestUsersModule(View $view)
	{
  		$users = User::remember(120)->latest()->take(5)->get();
  		// $users = User::latest()->take(5)->get();

		$view->with(compact('users'));
	}
	public function TopMusicsModule(View $view)
	{
	  	$musics = Music::remember(120, 'top.musics')
	  		->latest('download')
			->latest('play')
			->latest('vote_up')
			->latest('views')
			->take(5)
			->get();

		$view->with(compact('musics'));
	}

	public function TopVideosModule(View $view)
	{
  		$videos = Video::remember(120, 'top.videos')
  			->latest('download')
			->latest('vote_up')
			->latest('views')
			->take(5)
			->get();

		$view->with(compact('videos'));
	}

	public function topUsersModule(View $view)
	{
		$users = Cache::get('top.users', function() {
			$users = User::withCount('musics', 'videos')->get();

			$users->each(function($user) {
				$user->totalcount 	= $user->musicsCount + $user->videosCount;
				print_r($user->totalcount);
			});

			$users->sort(function($a, $b) {
				$a = (int) $a->totalcount;
				$b = (int) $b->totalcount;

				if ($a == $b) {
					return 0;
				}

				return ($a > $b) ? 1 : -1;
			});

			// $reverse_users = $users->reverse();

			// $users = $reverse_users->slice(0, 5);
			$users = $users->slice(0, 10);

			Cache::put('top.users', $users, 120);

			return $users;
		});

		$view->with(compact('users'));
	}
}