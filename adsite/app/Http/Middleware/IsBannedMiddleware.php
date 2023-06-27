<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBannedMiddleware
{
    public function handle(Request $request, Closure $next)
{
        $routeName = $request->route()->getName();

        if (auth()->check() && auth()->user()->is_banned == 1 && !auth()->user()->is_admin &&  $routeName !== 'banned')  {
            return redirect()->route('banned');
        }

        return $next($request);
}
}
