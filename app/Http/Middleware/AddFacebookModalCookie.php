<?php

namespace App\Http\Middleware;

use Closure;

class AddFacebookModalCookie
{
    public function handle($request, Closure $next)
    {
        if($request->hasCookie('facebook-modal')) {
            return $next($request);
        }   else {
            $response = $next($request);
            return $response->withCookie('facebook-modal', 'show', 1);
        }
    }
}
