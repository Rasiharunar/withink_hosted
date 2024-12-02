<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class basicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->header('php-auth-user');
        $password = $request->header('php-auth-pw');

        // Cari pengguna berdasarkan email (atau username)
        $user = User::where('email', $username)->first();

        // Verifikasi password
        if ($user && Hash::check($password, $user->password)) {
            auth()->login($user); // Login pengguna
            return $next($request);
        }

        // Jika autentikasi gagal
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
