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
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user || !$user->isAdmin()) {
            return redirect('login');
        }
        return $next($request);
    }
}
