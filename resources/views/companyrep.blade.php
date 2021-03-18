<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="animate__animated animate__backInUp">
                StayConnected | COMPANY REPRESENTATIVES LOGIN
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 animate__animated animate__backInRight" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 animate__animated animate__backInUp" :errors="$errors" />

        <form method="POST" action="/companyreps/login">
            @csrf

            <!-- Email Address -->
            <div class="animate__animated animate__backInLeft">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="animate__animated animate__backInLeft block mt-1 w-full" type="email" name="email" :value="old('email')"  autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 animate__animated animate__backInLeft">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="animate__animated animate__backRight block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="animate__animated animate__backInLeft rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 animate__animated animate__backInLeft">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>

                    <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900" href="/register">
                        Dont have an account?
                    </a>
                @endif

                <x-button class="ml-3 animate__animated animate__backInUp">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
