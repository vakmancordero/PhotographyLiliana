<?php

namespace App\Http\Middleware;

use Closure;

class UserLevel
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
        if (Auth::guard($guard)->check() && Auth::user()->level == 1) {
            return $next($request);
        }else {
            return redirect('/cliente/registros');
        }
    }
}
