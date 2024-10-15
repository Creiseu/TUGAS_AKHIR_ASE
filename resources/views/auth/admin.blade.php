<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Title -->
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Admin Login
        </h1>
    </div>

    <form method="POST" action="{{ route('admin') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="masukkan email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="masukkan kata sandi"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <a href="{{ route('regisadmin') }}" class="rounded-md py-2 text-blue-700 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Belum Punya Akun?
            </a>
        </div>
        
        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('dashboards') }}" class="flex items-center py-1 px-2 text-lg rounded-xl text-blue-500 hover:text-blue-600 transition font-semibold">
                <svg fill="#0000FF" height="16px" width="16px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 476.213 476.213" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 57.427,253.107 476.213,253.107 "></polygon> </g></svg>
                <span class="ml-2"></span>
            </a>

            <div class="flex items-center">
                @if (Route::has('admin.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-4" href="{{ route('admin.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
        
                <x-primary-button class="ml-3">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </div>
        
    </form>
</x-guest-layout>
