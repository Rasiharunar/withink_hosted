<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
                // $request->session()->flash('success', 'Login berhasil! Selamat datang di dashboard.');

                return redirect()->intended('dashboard');

            }
            return redirect()->back()->withErrors(['email' => 'Email atau password salah.']);

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login'); // Mengarahkan kembali ke halaman login
    }
}
