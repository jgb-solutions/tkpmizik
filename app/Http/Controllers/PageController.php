<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MP3;
use App\MP4;
use App\Page;
use Cache;

class PageController extends Controller
{
	public function getIndex()
	{
		$data = [
			'mp3s' => MP3::latest()->published()->take(3)->get(),
			'mp4s' => MP4::latest()->take(3)->get()
		];

		return view('home')->with($data);
	}

	public function getPage($slug)
	{
		// $page = Page::remember(60)->whereSlug($slug)->first();
		$page = Page::whereSlug($slug)->first();

		if ($page)
		{
			 return view("pages.page", compact('page'));
		}

		return Redirect::to('/404');
	}
}