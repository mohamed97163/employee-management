<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckManagerAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('manager')->check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}