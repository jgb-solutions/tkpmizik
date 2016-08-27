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

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin')->except([
			'show',
			'music',
			'video'
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

		Cache::flush();

		return redirect(route('admin.cat'));
	}

	public function show($slug)
	{
		$cat = Category::remember(120)->whereSlug($slug)->firstOrFail();
		// $cat = Category::whereSlug($slug)->first();

		$musics = $cat->musics()->remember(120)->published()->latest()->take(20)->get();
		// $musics = $cat->musics()->published()->latest()->take(20)->get();
		$videos = $cat->videos()->remember(120)->latest()->take(20)->get();
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

		$data = [
			'results' => $merged->shuffle(),
			'cat' => $cat,
			'title' => "Navige Tout $cat->name Yo",
			'musiccount' => $musics->count(),
			'videocount' => $videos->count(),
			'author' => ''
		];

		return view('cats.show', $data);
	}

	public function music($slug)
	{
		$cat = Category::remember(120)->whereSlug($slug)->first();
		// $cat = Category::whereSlug($slug)->first();

		$data = [
			'cat' 	=> $cat,
			'musics' 	=> $cat->musics()->remember(120)->published()->latest()->paginate(10),
			// 'musics' 	=> $cat->musics()->published()->latest()->paginate(10),
			'title' => $cat->name
		];

		return view('cats.music', $data);
	}

	public function video($slug)
	{
		$cat = Category::remember(120)->whereSlug($slug)->first();
		// $cat = Category::whereSlug($slug)->first();

		$data = [
			'cat' 	=> $cat,
			'videos' 	=> $cat->videos()->remember(120)->latest()->paginate(10),
			// 'videos' 	=> $cat->videos()->latest()->paginate(10),
			'title' => $cat->name
		];

		return view('cats.video', $data);
	}

	public function edit($id)
	{
		$data = [
			'category' 	 => Category::findOrFail($id),
			'categories' => Category::byName()->get(),
		];

		return view('cats.edit', $data);
	}

	public function update(Request $request)
	{
		$id = $request->get('id');

		$rules = ['name' => 'required', 'slug' => 'required'];

		$messages = [
			'name.required' => config('site.validate.name.required'),
			'slug.required' => config('site.validate.slug.required')
		];

		$validator = Validator::make( $request->all(), $rules, $messages );

		if ($validator->fails()){
			return redirect( route('admin.cat.edit', $id) )
				->withErrors($validator);
		}

		$category = Category::findOrFail($id);

		$category->name = $request->get('name');
		$category->slug = str_slug($request->get('slug'));
		$category->save();

		Cache::flush();

		return redirect(route('admin.cat'));
	}

	public function delete($id)
	{
		Category::destroy($id);

		Cache::flush();

		return back();
	}

}