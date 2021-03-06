<?php

namespace App\Http\Middleware;

use Closure;

class Eventheads
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
        if(Auth::check() && Auth::user()->isEventheads())
            return $next($request);

        return redirect('admin.login');
    }
}
