<?php

namespace App\TKPM;

use App;
use Mail;
use Auth;
use Cache;
use Image;
use getID3;
use Storage;
use Twitter;
use App\Models\Vote;
use getid3_writetags;

class TKPM
{
	public static function vote($obj, $obj_id, $vote_up, $vote_down)
	{
		$key = "vote$obj$obj_id";

		$html = Cache::remember($key, 120, function() use ($obj, $obj_id, $vote_up, $vote_down, $key) {
			$btn1 		= 'default';
			$disabled1 	= '';
			$btn2 		= 'default';
			$disabled2 	= '';

			$user_id = Auth::user()->id;

			$vote = Vote::whereUserId($user_id)
						->whereObjId($obj_id)
						->whereObj($obj)
						->first();
			if ($vote) {
				if ($vote->vote == 1) {
					$btn1 = 'success';
					$disabled2 = "disabled='disabled'";
				} elseif ($vote->vote == -1) {
					$btn2 = 'danger';
					$disabled1 = "disabled='disabled'";
				}
			}

			$html = "<button
					class='btn btn-$btn1'
					id='voteUp'  $disabled1>
					<i class='fa fa-thumbs-o-up fa-lg'></i>
					<small>
						<span class='vote-num' id='vote-up-num'>";
			$html .=  $vote_up ?: '';
			$html .= "</span>
					</small>
				</button>";
			// 	<button
			// 		class='btn btn-$btn2'
			// 		id='voteDown'  $disabled2>
			// 		<i class='fa fa-thumbs-o-down fa-lg'></i>
			// 		<small>
			// 			<span class='vote-num' id='vote-down-num'>";
			// $html .=  $vote_down ?: '';
			// $html .= "</span>
			// 		</small>
			// 	</button>";

			return $html;
		});

		return $html;
	}

	public static function image($in, $width = null, $height = null, $out)
	{
		Image::make(storage_path('app/public/images/' . $in))
			->resize($width, $height, function($constraint) {
				$constraint->aspectratio();
			})
			->save(storage_path("app/public/images/$out/" . $in));
	}

	public static function size($size, $round = 2)
	{
    	$sizes = [' B', ' KB', ' MB'];

    	$total = count($sizes) - 1 ;

    	for ($i = 0; $size > 1024 && $i < $total; $i++) {
       	$size /= 1024;
    	}

    	return round($size, $round) . $sizes[$i];
	}

	public static function tag($music, $image_name = null, $type)
	{
		$mp3_handler = new getID3;
   	$mp3_handler->setOption(['encoding'=> 'UTF-8']);

    	$mp3_writter = new getid3_writetags;

    	$mp3_writter->filename          = storage_path('app/public/musics/' . $music->mp3name);
	  	$mp3_writter->tagformats        = ['id3v2.3'];
	  	$mp3_writter->overwrite_tags    = true;
	  	$mp3_writter->tag_encoding      = 'UTF-8';
	  	$mp3_writter->remove_other_tags = true;

	  	$mp3_data['title'][]   = $music->name;
	  	$mp3_data['artist'][]  = config('site.name') . ' ' . config('site.separator') . ' ' . config('site.url'); //$mp3_artist;
	  	$mp3_data['album'][]   = config('site.name') . ' ' . config('site.separator') . ' ' . config('site.url');
	  	// $mp3_data['year'][]    = $mp3_year;
	  	// $mp3_data['genre'][]   = $mp3_genre;
	  	$mp3_data['comment'][] = config('site.name') . ' ' . config('site.separator') . config('site.url');

	  	if ($music->price == 'paid') {
	    		$mp3_data['attached_picture'][0]['data'] = Storage::disk('images')->get('thumbs/' . $image_name);
	    		$mp3_data['attached_picture'][0]['picturetypeid'] = $type;
	  		$mp3_data['attached_picture'][0]['mime'] = $type;
	  	} else {
	    		$mp3_data['attached_picture'][0]['data']		 	= file_get_contents(config('site.logo'));
	    		$mp3_data['attached_picture'][0]['picturetypeid'] 	= "image/jpg";
	    		$mp3_data['attached_picture'][0]['mime'] 			= "image/jpg";
	  	}

	  	$mp3_data['attached_picture'][0]['description'] = config('site.name') .
	  		' ' . config('site.separator') . ' ' .  config('site.description');

	  	$mp3_writter->tag_data = $mp3_data;

	  	return $mp3_writter->WriteTags();
	}

	public static function download($music)
	{
		$music->download += 1;
		$music->save();

		$mp3name = storage_path('app/public/musics/' . $music->mp3name);
		header('Content-Description: File Transfer');
	    	header('Content-Type: application/octet-stream');
	    	header('Content-Disposition: attachment; filename=' . $music->name . '.music' );
	    	header('Expires: 0');
	    	header('Cache-Control: must-revalidate');
	    	header('Pragma: public');
	    	header('Content-Length: ' . filesize($mp3name) );
	    	readfile($mp3name) ;
	    	exit;
	}

	public static function stream($music)
	{
		$music->play += 1;
		$music->save();

		$mp3name = storage_path('app/public/musics/' . $music->mp3name);

		header("Content-Type: audio/mpeg");
	    	header("Content-Length: " . filesize($mp3name) );
	    	header('Content-Disposition: filename=' . $music->name . '.music' );
	    	header('X-Pad: avoid browser bug');
	    	header('Cache-Control: no-cache');
	    	readfile($mp3name);
	    	exit;
	}

	public static function sendMail($view, $data, $type)
	{
		Mail::queue($view, $data, function($m) use ($data, $type) {
			extract($data);

			switch ($type)
			{
				case 'user':
					$email = $user->email;
					$name = $user->name;
				break;

				case 'music':
					$email = $music->user->email;
					$name = $music->name;
				break;

				case 'video':
					$email = $video->user->email;
					$name = $video->name;
				break;

				case 'buy':
					$email = $music->user->email;
					$name = $music->name;
				break;

				case 'guest3':
					$email = $music->userEmail;
					$name = 'Envite';
				break;

				case 'guest4':
					$email = $video->userEmail;
					$name = 'Envite';
				break;
			}

			$m->to($email, $name)
				->subject($data['subject'])
				->replyTo(config('site.email'));
		});
	}

	public static function seo($object, $type, $author)
	{
		if ($type === 'user') {
			// $image = url("/config('site.image_upload_path')/{$object->image}");
			$image = Self::asset($object->image, 'images');

			if ($object->username) {
				$url = url("/@{$object->username}");
			} else {
				$url = url("/u/$object->id");
			}
		}

		if ($type === 'music' || $type === 'video') {
			$url = url(route($type .'.show', [
				'id'=>$object->id,
				'slug'=>$object->slug
			]));

			if ($type === 'music') {
				$image = Self::asset($object->image, 'images');
			} else {
				$image = $object->image;
			}
		}

		if ($type === 'cat') {
			$url = url(route('cat.show', [
				'slug'=>$object->slug
			]));

			$image = '';
		}

		$html = "
		<link rel='canonical' href='$url' />
		<meta name='description' content='{$object->description}'/>

		<!-- Open Graph -->
		<meta property='og:title' content='$author {$object->name}' />
		<meta property='og:description' content='{$object->description}' />
		<meta property='og:url' content='$url' />
		<meta property='og:image' content='$image' />
		<!-- / Open Graph -->

		<!-- Twitter description -->
		<meta name='twitter:text:description' content='$object->description'>";

		return $html;
	}


	public static function firstName($name)
	{
		return explode(' ', $name)[0];
	}

	public static function profileLink($username = null, $id = null )
	{
		if ($username) {
			return route('user.public', ['username'=>$username]);
		} else {
			return route('user.public', ['id'=>$id]);
		}
	}

	public static function tweet($obj, $type)
	{
		if ( $type === 'music' ) {
			$status = '#NouvoMizik ';
		} elseif ( $type === 'video' ) {
			$status = '#NouvoVideyo ';
		}

		$status .= "$obj->name " . $obj->url .
					" via @TKPMizik @TiKwenPam #" . $obj->category->slug;

        	Twitter::postTweet([
        		'status' => $status,
        		'format' => 'json'
        	]);
	}

	public static function asset($asset, $size = 'null')
	{
		$imgSize = [
			'thumbs' 	=> config('site.image_upload_path') .'/thumbs/',
			'images' 	=> config('site.image_upload_path') .'/',
			'show'  		=> config('site.image_upload_path') .'/show/',
			'tiny' 		=> config('site.image_upload_path') .'/thumbs/tiny/',
			'profile' 	=> config('site.image_upload_path') .'/thumbs/profile/',
			'null'		=> ''
		];

		$relativeUrl = $imgSize[$size] . $asset;

		if ( App::isLocal() ) {
			return asset($relativeUrl);
		}

		$cdnUrl = 'https://cdn.tkpmizik.com/';

		return url($cdnUrl . $relativeUrl);
	}

	public static function route($path, $params = [])
	{
		if (!App::isLocal()) {
			return secure_url(route($path, $params, false));
		}

		return url(route($path, $params));
	}

	public static function profileImage($user)
	{
		if ($user->image) {
			return TKPM::asset($user->image, 'thumbs');
		} elseif ($user->avatar) {
			return $user->avatar;
		} else {
			return TKPM::asset(config('site.logo'));
		}
	}
}