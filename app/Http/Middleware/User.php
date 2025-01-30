<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    public function handle(Request $request, Closure $next, $role = 'user')
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('landing.index'); // Redirect ke landing page jika bukan user
        }

        return $next($request);
    }
}
