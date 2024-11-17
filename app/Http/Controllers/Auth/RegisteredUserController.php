<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MSensor;
use App\Models\Relay;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:user,admin,editor'], // Validasi untuk role

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Menyimpan role pengguna

        ]);

        MSensor::create([
            'user_id' => $user->id, // Menyimpan ID pengguna
            'kelembapan' => '0.0', // Ganti dengan nilai default yang Anda inginkan
            'volume_tanki' => '0.0', // Ganti dengan nilai default yang Anda inginkan
        ]);

        // Menambahkan data ke tabel relays
        Relay::create([
            'user_id' => $user->id, // Menyimpan ID pengguna
            'relay1' => '0', // Nilai default untuk relay1
            'relay2' => '0', // Nilai default untuk relay2
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
