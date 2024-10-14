<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class=" flex justify-between mt-3">
                <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 ml-8" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>


        <div class="flex items-center justify-start py-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm m-2 py-5 text-gray-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="p-6 flex justify-between">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('register'))
                <x-primary-button class="ms-3">
                    <a href="{{ route('register') }}" >Register</a>
                </x-primary-button>
            @endif
        </div>

    </form>
</x-guest-layout>
