<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Cache;

use App\Models\Music;
use App\Models\Video;

use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;
use Suin\RSSWriter\Channel;

class FeedController extends Controller
{
	public function music()
	{
		return $this->getRss('music');
	}

	public function video()
	{
		return $this->getRss('mp4');
	}

	private function getRSS($type)
	{
		$key = $type . '_rss_feed_';

		if (Cache::has($key))
		{
			return Cache::get($key);
		}

		switch ($type) {
			case 'music':
				$objs =  Music::published()
							->latest()
							->with('category')
							->take(10)
							->get();

				$hash = 'Mizik';
			break;
			case 'mp4':
				$objs = Video::latest()
							->with('category')
							->take(10)
							->get();

				$hash = 'Videyo';
			break;
		}

		$rss = $this->buildRssData($objs, $type, $hash);

		$rss = response($rss)->header('Content-type', 'application/rss+xml');

		Cache::put($key, $rss, 30);

		return $rss;

	}

	/**
	* Return a string with the feed data
	*
	* @return string
	*/
	protected function buildRssData($objs, $type, $hash)
	{
		$now 		= \Carbon\Carbon::now();
		$feed 		= new Feed();
		$channel 	= new Channel();

		$channel->title(config('site.name'))
				->description(config('site.description'))
				->url(env('SITE_URL'))
				->language('ht')
				->copyright('&copy; 2012 - ' . date('Y') . ' ' . config('site.name') . ', Tout Dwa Rezève.')
				->lastBuildDate($now->timestamp)
				->appendTo($feed);

		foreach ($objs as $obj)
		{
			$item = new Item();

			$title = "#Nouvo$hash $obj->name #{$obj->category->slug} via @TKPMizik | @TiKwenPam";

			$item->title($title)
				->description($obj->description)
				->url($obj->url)
				->pubDate($obj->created_at->timestamp)
				->guid($obj->url, true)
				->appendTo($channel);
		}

		$feed = (string) $feed;
		// Replace a couple items to make the feed more compliant
		$feed = str_replace(
			'<rss version="2.0">',
			'<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
			$feed
		);

		$feed = str_replace(
			'<channel>',
			'<channel>
			<atom:link href="'. url(config('site.url') . "/feed/$type") . '" rel="self" type="application/rss+xml" />',
			$feed
		);

		return $feed;
	}
}