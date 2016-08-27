<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    		if (! Auth::check()) {
                	return redirect(route('login'))
                   		->withMessage(config('site.message.konekte'))
                    	->withStatus('info');
    		}

    		if (! Auth::user()->admin) {
    			return redirect('/')
    			 	->withMessage(config('site.message.mustBeAdmin'))
                   		->withStatus('warning');
    		}

       	return $next($request);
    }
}
