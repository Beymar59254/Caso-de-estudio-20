<x-guest-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-extrabold text-gray-900 dark:text-white">
                    Beymar Fabian Rodriguez Machicado
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Acceso al sistema</p>
            </div>

            <div class="bg-white dark:bg-gray-900/60 border border-gray-200 dark:border-gray-800 rounded-2xl shadow-xl p-6 animate__animated animate__fadeIn">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Usuario')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5 me-2" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 4a2 2 0 012-2h4a2 2 0 012 2v1h-2V4H5v12h4v-1h2v1a2 2 0 01-2 2H5a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M10 8a1 1 0 011-1h6a1 1 0 011 1v8a1 1 0 01-1 1h-6a1 1 0 01-1-1V8zm3 1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                    </svg>
                    {{ __('Iniciar sesión') }}
                </span>
            </x-primary-button>
        </div>
    </form>

            </div>
        </div>
    </div>
</x-guest-layout>
