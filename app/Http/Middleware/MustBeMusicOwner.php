<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Music;

class MustBeMusicOwner
{
	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	public function handle($request, Closure $next)
	{
		$music = $request->route('music');

	  	if (! $this->user->admin) {
	  		if (! $this->user->owns($music)) {
	      	return redirect('/')
	         	->withMessage(config('site.message.mustBeMusicOwner'))
	         	->withStatus('warning');
	      }
	  	}

	  return $next($request);
	}
}
