<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use Cache;
use Validator;
use App\Models\User;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin')->except([
			'show',
			'musics',
			'videos'
		]);
	}

	public function getCreate()
	{
		$data = [
			'categories' => Category::remember(999, 'allCategories')->byName()->get(),
			'title' => 'Kreye Yon Nouvo Kategori'
		];

		return view('cats.create', $data);
	}

	public function postCreate(Request $request)
	{
		$rules = ['name' => 'required', 'slug' => 'required'];

		$messages = [
			'name.required' => config('site.validate.name.required'),
			'slug.required' => config('site.validate.slug.required')
		];

		$validator = Validator::make( $request->all(), $rules, $messages );

		if ($validator->fails()) {
			return redirect(route('admin.cat'))
				->withErrors($validator);
		}

		Category::create([
			'name' => $request->get('name'),
			'slug' => Str::slug($request->get('slug'))
		]);

		Cache::forget('allCategories');

		return redirect(route('admin.cat'));
	}

	public function show($slug)
	{
		$key = "category.$slug";

		$data = Cache::rememberForever($key, function() use ($slug) {
		   $cat = Category::with([
						'musics' => function($query) {
							$query->published()->latest()->take(20);
						},
						'videos' => function($query) {
							$query->latest()->take(20);
						}
					])
				->whereSlug($slug)
				->firstOrFail();
			// $cat = Category::whereSlug($slug)->first();

			$musics = $cat->musics;
			// $musics = $cat->musics()->published()->latest()->take(20)->get();
			$videos = $cat->videos;
			// $videos = $cat->videos()->latest()->take(20)->get();

			$musics->each( function($music) {
				$music->type = 'music';
				$music->icon = 'music';
			});

			$videos->each( function($video) {
				$video->type = 'video';
				$video->icon = 'facetime-video';
			});

			$merged = $musics->merge($videos);

			return [
				'results' => $merged->shuffle(),
				'cat' => $cat,
				'title' => "Navige Tout $cat->name Yo",
				'musiccount' => $musics->count(),
				'videocount' => $videos->count(),
				'author' => ''
			];
		});

		return view('cats.show', $data);
	}

	public function musics($slug)
	{
		if (request()->has('page')) {
			$page = request()->get('page');
		} else {
			$page = 1;
		}

		$key = "category_musics_" . $slug . $page;

		$data = Cache::rememberForever($key, function() use ($slug) {
		   $cat = Category::with([
				'musics' => function($query) {
					$query->published()->latest();
				}
			])
			->whereSlug($slug)->first();

			return [
				'cat' 	=> $cat,
				'musics' 	=> $cat->musics()->paginate(24),
				// 'musics' 	=> $cat->musics()->published()->latest()->paginate(10),
				'title' => $cat->name
			];
		});

		return view('cats.music', $data);
	}

	public function videos($slug)
	{
		if (request()->has('page')) {
			$page = request()->get('page');
		} else {
			$page = 1;
		}

		$key = "category_videos_" . $slug . $page;

		$data = Cache::rememberForever($key, function() use ($slug) {
		   $cat = Category::with([
				'videos' => function($query) {
					$query->latest();
				}
			])
			->whereSlug($slug)->first();

			return [
				'cat' 	=> $cat,
				'videos' 	=> $cat->videos()->paginate(24),
				'title' => $cat->name
			];
		});

		return view('cats.video', $data);
	}

	public function edit(Category $category)
	{
		return view('cats.edit', [
			'category' 	 => $category,
			'categories' => Cache::get('allCategories', Category::byName()->get()),
		]);
	}

	public function update(UpdateCategoryRequest $request, Category $category)
	{
		$category->name = $request->get('name');
		$category->slug = str_slug($request->get('slug'));
		$category->save();

		Cache::forget('allCategories');

		return redirect(route('admin.cat'));
	}

	public function destroy($id)
	{
		Category::destroy($id);

		Cache::forget('allCategories');

		return back();
	}
}