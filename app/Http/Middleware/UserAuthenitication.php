<?php

/*just a simple middle to authenticate users when logging
to their profile and other authenticated pages*/

namespace churchapp\Http\Middleware;

use Closure;

class UserAuthenitication
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
        if(Auth::c)
        return $next($request);
    }
}
