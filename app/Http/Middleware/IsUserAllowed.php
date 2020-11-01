<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()->isAllowed()){
            auth()->logout();
            return redirect()->route('login')->withError('Vous n\'avez pas accès a notre application.');
        }
        return $next($request);
    }
}
