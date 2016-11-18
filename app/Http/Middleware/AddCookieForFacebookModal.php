<?php

namespace App\Http\Middleware;

use Closure;

class AddCookieForFacebookModal
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
        if($request->hasCookie('facebook-modal')) {
            return $next($request);
        } else {
            return $next($request)->withCookie('facebook-modal', 'show', 1);
        }
    }
}