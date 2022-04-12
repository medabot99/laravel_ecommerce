<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class User
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
        if (auth()->user()->role->id == 3){
            return $next($request);
        }

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
