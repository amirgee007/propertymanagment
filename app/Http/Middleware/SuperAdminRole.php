<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminRole
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
            return redirect()->route('get.dashboard');
        }
        return $next($request);
    }
}
