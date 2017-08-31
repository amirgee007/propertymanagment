<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole
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
        if (! $request->user()->hasRole('Super Admin')) {
            if (! $request->user()->hasRole('Admin')) {
                return redirect()->route('get.dashboard');
            }
        }

        return $next($request);
    }
}
