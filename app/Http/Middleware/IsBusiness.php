<?php

namespace App\Http\Middleware;

use Closure;

class IsBusiness
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @return role
     */
    public function handle($request, Closure $next)
    {
       if (auth()->check())
        {
            return $next($request);
        }

        return redirect('/restricted');
    }
}
