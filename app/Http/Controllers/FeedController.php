<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use App\Models\Music;
use App\Models\Video;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;
use Suin\RSSWriter\Channel;

class FeedController extends Controller
{
	public function musics()
	{
		return $this->getRss('musics');
	}

	public function videos()
	{
		return $this->getRss('videos');
	}

	private function getRSS($type)
	{
		$key = $type . '_rss_feed_';

		$rss = Cache::rememberForever($key, function() use ($type) {
			switch ($type) {
				case 'musics':
					$objs =  Music::published()
								->latest()
								->with('category')
								->take(30)
								->get();

					$hash = 'Mizik';
					$type = 'mizik';
				break;

				case 'videos':
					$objs = Video::latest()
								->with('category')
								->take(30)
								->get();

					$hash = 'Videyo';
					$type = 'videyo';
				break;
			}

			$rss = $this->buildRssData($objs, $type, $hash);

			$rss = response($rss)->header('Content-type', 'application/rss+xml');

			return $rss;
		});

		return $rss;
	}

	/**
	* Return a string with the feed data
	*
	* @return string
	*/
	protected function buildRssData($objs, $type, $hash)
	{
		$now 		= Carbon::now();
		// $feed 		= new Feed();
		// $channel 	= new Channel();

		// $channel->title(config('site.name'))
		// 		->description(config('site.description'))
		// 		->url(config('site.url'))
		// 		->language('ht')
		// 		->copyright('2012 - ' . date('Y') . ' ' . config('site.name') . ', Tout Dwa Rezève.')
		// 		->lastBuildDate($now->timestamp)
		// 		->appendTo($feed);

		// foreach ($objs as $obj)
		// {
		// 	$item = new Item();

		// 	$title = "#Nouvo$hash $obj->name #{$obj->category->slug} via @TKPMizik @TiKwenPam";

		// 	$item->title($title)
		// 		->description($obj->description)
		// 		->url($obj->url)
		// 		->pubDate($obj->created_at->timestamp)
		// 		->guid($obj->url, true)
		// 		->appendTo($channel);
		// }

		// $feed = (string) $feed;

		// // Replace a couple items to make the feed more compliant
		// $feed = str_replace(
		// 	'<rss version="2.0">',
		// 	'<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
		// 	$feed
		// );

		// $feed = str_replace(
		// 	'<channel>',
		// 	'<channel>
		// 	<atom:link href="'. secure_url(config('site.url') . "/feed/$type") . '" rel="self" type="application/rss+xml" />',
		// 	$feed
		// );

		// return $feed;

		$feed = new Feed();

		$channel = new Channel();
		$channel
		    ->title(config('site.name'))
		    ->description(config('site.description'))
		    ->url(config('site.url'))
		    ->language('ht-HT')
		    ->copyright('2012 - ' . date('Y') . ' ' . config('site.name') . ', Tout Dwa Rezève.')
		    ->pubDate(Carbon::now())
		    ->lastBuildDate(Carbon::now())
		    ->ttl(60)
		    // ->pubsubhubbub('http://example.com/feed.xml', 'http://pubsubhubbub.appspot.com') // This is optional. Specify PubSubHubbub discovery if you want.
		    ->appendTo($feed);

		foreach ($objs as $obj) {
			$item = new Item();
			$item
			    ->title($obj->title)
			    ->description($obj->description)
			    // ->contentEncoded('<div>Blog body</div>')
			    ->url($obj->url)
			    ->author($obj->user->name)
			    ->pubDate($obj->create_at)
			    ->guid($obj->url, true)
			    ->preferCdata(true) // By this, title and description become CDATA wrapped HTML.
			    ->appendTo($channel);
			}

		return $feed; // or echo $feed->render();
	}
}