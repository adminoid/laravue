<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!$request->user())
            return redirect('login');
        elseif($request->user()->email('mr@adminoid.com'))
            return $next($request);
        else
            return $next($request);
    }
}
