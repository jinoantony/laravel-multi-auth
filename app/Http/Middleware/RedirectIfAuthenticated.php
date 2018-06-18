<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @param  string  $redirectTo
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, $redirectTo = '/home')
    {
        if (Auth::guard($guard)->check()) {
            return redirect($redirectTo);
        }

        return $next($request);
    }
}
