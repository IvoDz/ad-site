<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBannedMiddleware
{
    public function handle(Request $request, Closure $next)
{
        if (auth()->check() && auth()->user()->is_banned == 1 && !auth()->user()->is_admin)  {
            return redirect()->route('banned');
        }

        return $next($request);
}
}
