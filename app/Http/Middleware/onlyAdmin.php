<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class onlyAdmin
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
        if (auth()->guest() ||
                auth()->id()!=1
//        auth()->user()->name!="Serena Sawayn"
        )
        {
            abort(403);
        }

        return $next($request);
    }
}
