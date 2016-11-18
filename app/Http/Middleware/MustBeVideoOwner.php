<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Video;

class MustBeVideoOwner
{
	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	public function handle($request, Closure $next)
	{
		$video = $request->route('video');

	  	if (! $this->user->admin) {
	  		if (! $this->user->owns($video)) {
	      	return redirect('/')
	         	->withMessage(config('site.message.mustBeVideoOwner'))
	         	->withStatus('warning');
	      }
	  	}

	  return $next($request);
	}
}
