<?php

namespace churchapp\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if($request->user()->type != 'A')
        {
            return back()->with('error','not enough priviledges');
        }
        return $next($request);
    }
}
