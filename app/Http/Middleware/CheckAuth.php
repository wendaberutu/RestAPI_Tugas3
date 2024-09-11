<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level === 'admin') {
            return $next($request);
        }

        // Log jika tidak dapat diakses
        if (Auth::check()) {
            Log::info('Access denied for user: ' . Auth::user()->email);
        } else {
            Log::info('Access denied for unauthenticated user');
        }

        return redirect()->route('login'); // Redirect ke halaman login jika tidak diizinkan
    }
}
