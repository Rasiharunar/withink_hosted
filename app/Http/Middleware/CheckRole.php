<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Memeriksa apakah pengguna terautentikasi dan memiliki peran yang sesuai
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Jika tidak, redirect ke halaman login atau halaman lain
            return redirect()->route('login')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
