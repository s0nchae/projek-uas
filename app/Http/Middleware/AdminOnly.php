<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must login first!');
        }

        // Cek kalau role user adalah admin
        if (Auth::user()->role !== 'admin') {
            return abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
