<?php

// app/Http/Middleware/CheckRole.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
{
    // Memeriksa apakah pengguna terautentikasi
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            // Izinkan akses ke rute admin.dashboard dan admin.edit
            if (!$request->routeIs('admin.dashboard') && !$request->routeIs('admin.edit')) {
                return redirect()->route('admin.dashboard');
            }
        } elseif (Auth::user()->role == 'user' && !$request->routeIs('dashboard')) {
            return redirect()->route('dashboard');
        }
    }

    // Jika tidak ada peran yang cocok, lanjutkan permintaan
    return $next($request);
}
}
