<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-light-400 p-6 rounded-lg shadow-md">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-customBlue" /> <!-- Ubah warna teks di sini -->
            <x-text-input id="email" class="block mt-1 w-full bg-light border border-light-300 focus:border-light-500 focus:ring focus:ring-light-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-light" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-customBlue" /> <!-- Ubah warna teks di sini -->

            <x-text-input id="password" class="block mt-1 w-full bg-light border border-light-300 focus:border-light-500 focus:ring focus:ring-light-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-light" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-light">
                <input id="remember_me" type="checkbox" class="rounded border-light-300 text-light-600 shadow-sm focus:ring-light-500" name="remember">
                <span class="ms-2 text-sm text-light">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-light hover:text-light-300" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <div class="text-center">
                <a class="small text-light" href="{{ route('register') }}">Create an Account!</a>
            </div>

            <x-primary-button class="ms-3 bg-light-600 hover:bg-light-700">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
