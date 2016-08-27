<?php
namespace App\Http\Controllers;

use Str;
use App;
use Mail;
use Auth;
use Cache;
use TKPM;
use Validator;
use App\Models\User;
use App\Models\Vote;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Snowfire\Beautymail\Beautymail;

class VideoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except([
			'index',
			'show',
			'getvideo'
		]);
	}

	public function index()
	{
		$data = [
			'videos' => Video::remember(120)->latest()->paginate(10),
			// 'videos' => Video::latest()->paginate(10),
		];

		return view('video.index', $data);
	}

	public function upload()
	{
		$data = [
			'categories' => Category::remember(999, 'allCategories')->byName()->get(),
			// 'categories' => Category::byName()->get(),
			'title' 	 => 'Mete Yon Videyo YouTube'
		];

		return view('video.upload', $data);
	}

	public function store(Request $request)
	{
		$rules = [
			'name' 	=> 'required',
			'artist' 	=> 'required',
			'url' 	=> 'required|url|min:11',
		];

		$messages = [
			'name.required' 	=> config('site.validate.name.required'),
			'artist.required' 	=> config('site.validate.artist.required'),
			// 'name.min'			=> config('site.validate.name.min'),
			'url.required'		=> config('site.validate.url.required'),
			'url.url'			=> config('site.validate.url.url'),
			'url.url'			=> config('site.validate.url.url'),
			'url.min'			=> config('site.validate.url.min'),
			'email.required' 	=> config('site.validate.email.required')
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}

		$name = $request->get('name');
		$artist = $request->get('artist');

		// Extracts the YouTube ID from various URL structures
		$url = $request->get('url');
		$regex = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
		if (preg_match($regex, $url, $match)) {
	    		$id 	= $match[1];
	    		$image_url 	=	"http://img.youtube.com/vi/$id/hqdefault.jpg";
		} else {
			return back()
				->withMessage(config('site.message.youtube-failed'));
		}

		$storedvideo = Video::whereName($request->get('name'))->first();

		if ($storedvideo) {
			if ($request->ajax()) {
	        		$response = [
		        		'success'  => true,
		        		'url' => route('video', [
		        			'id'=>$storedvideo->id,
		        			'name' => $storedvideo->slug
		        		])
	        		];

	        		return $response;
	        	}

			return redirect(route('video.show', ['id'=>$storedvideo->id, 'slug'=>$storedvideo->slug]));
		}

		$user_id = Auth::user()->id;

		// Insert the infos in the database
		$video = new video;
		$video->name = ucwords($request->get('name'));
		$video->artist = ucwords($request->get('artist'));
		$video->slug = Str::slug($request->get('name'));
		$video->youtube_id = $id;
		$video->image = $image_url;
		$video->user_id  = $user_id;
		$video->category_id = $request->get('cat');
		$video->description 	= $request->get('description');
		$video->save();

		if (App::environment() == 'production') {
			TKPM::tweet($video, 'video');
		}

		// Send a  email to the new user letting them know their video has been uploaded
		$data = [
			'video' 		=> $video,
			'subject' 	=> 'Felisitasyon!!! Ou fèk mete yon nouvo videyo'
		];

		TKPM::sendMail('emails.user.video', $data, 'video');

		Cache::flush();

		return redirect(route('video.show', ['id'=>$video->id, 'slug'=>$video->slug]));
	}

	public function show($id)
	{
		$key = '_video_show_' . $id;

		$data = Cache::get($key, function() use ($id, $key) {
			$video = Video::with('user', 'category')->findOrFail($id);

			// $video->views += 1;
			// $video->save();

			$related = Video::related($video)
				->get(['id', 'name', 'image', 'download', 'views', 'slug']);
			// return $related;

			$author = $video->user->username ? '@' . $video->user->username . ' &mdash;' : $video->user->name . ' &mdash; ';

			$data = [
				'video' => $video,
				'related' => $related,
				'author' => $author
			];

			Cache::put($key, $data, 120);

			return $data;
		});

		return view('video.show', $data);
	}

	public function edit($id)
	{
		$video = Video::findOrFail($id);

		$cats = Category::remember('999', 'allCategories')->byName()->get();

		$user = Auth::user();

		if ($user->owns($video) || $user->iadmin) {
			$data = [
			    'video' => $video,
			    'title' => "Modifye $video->name",
			    'cats' => $cats
			];

			return view('video.edit', $data);
		}

		return redirect('/')
			->withMessage(config('site.message.mustBeVideoOwner'))
			->withStatus('warning');
	}

	public function update($id, Request $request)
	{
		$rules = [
			// 'name' 	=> 'min:6',
			'image'	=> 'image'
		];

		$messages = [
			// 'name.min'		=> config('site.validate.name.min'),
			'image.image'	=> config('site.validate.image.image')
		];

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return back()
				->withErrors($validator);
		}

		$name = $request->get('name');
		$artist = $request->get('artist');
		$slug = Str::slug($name);
		$description = $request->get('description');
		$category = $request->get('cat');

		$video = Video::find( $id );

		if (! empty($name)) {
			$video->name = ucwords($name);
		}

		if (! empty($artist)) {
			$video->artist = ucwords($artist);
		}

		if (! empty($description)) {
			$video->description = $description;
		}

		if (! empty($image)) {
			$video->image = $imagename;
		}

		if (! empty($category)) {
			$video->category_id = $category;
		}

		$video->slug = $slug;
		$video->save();

		Cache::flush();

		return redirect(route('video.show', [
			'id' => $video->id,
			'slug' => $video->slug
		]))
		->withMessage(config('site.message.update-success'))
		->withStatus('success');
	}

	public function destroy(Request $request, video $video)
	{
		$user = $request->user();

		if ($user->owns($video) || $user->admin) {
			Vote::whereObj('video')
				->whereObjId($video->id)
				->whereUserId($user->id)
				->delete();

				$video->delete();

				Cache::flush();

				if ($user->admin) {
					return redirect(route('admin.video'));
				}

				return redirect(route('video'))
						->withMessage(config('site.message.delete-video-success'));
		}
	}

	public function getvideo($id)
	{
		$video = Video::findOrFail($id);

		$video->download += 1;
		$video->save();

		$youtube_url = 'http://savefrom.net/#url=' .
			urlencode('https://www.youtube.com/watch?v=' . $video->youtube_id);

		return redirect($youtube_url);
	}
}