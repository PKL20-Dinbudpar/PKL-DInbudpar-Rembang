<x-guest-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Heading --}}
    <h1 class=" text-center font-bold"> Sistem Informasi Pendataan Kunjungan Wisata <br> Kab. Rembang</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="username" :value="__('Username')" />

            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Validation Errors -->
        <x-input-error :messages="$errors->get('failed')" class="mt-2" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif --}}

            <x-primary-button class="ml-3">
                {{ __('Login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>