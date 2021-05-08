<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChakAge
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

        if ($request->age >= 25) {
            return redirect('/login');
        }else{
            return $next($request);
        }

    }
}
