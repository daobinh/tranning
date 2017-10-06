<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RuleMiddleware
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
        if (Auth::user()->rule != 1) {
            return redirect('post');
        }
        
        return $next($request);
    }
}
