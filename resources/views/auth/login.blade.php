<x-guest-layout>
    <div class="space-y-6">
        <div class="space-y-2 text-center">
            <p class="auth-badge">Welcome back</p>
            <h2 class="text-3xl font-bold tracking-tight text-slate-950">Masuk ke akun Anda</h2>
            <p class="text-sm leading-7 text-slate-600">
                Lanjutkan ke dashboard sesuai role Anda.
            </p>
        </div>

        <x-auth-session-status class="status-banner" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="space-y-2">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-4 pt-1 sm:flex-row sm:items-center sm:justify-between">
                <label for="remember_me" class="inline-flex items-center gap-3 text-sm text-slate-600">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-sky-600 shadow-sm focus:ring-sky-500" name="remember">
                    <span>Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-slate-500 transition hover:text-sky-700" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>

            <div class="space-y-4 pt-2">
                <x-primary-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-primary-button>

                <p class="text-center text-sm text-slate-500">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-sky-700 transition hover:text-sky-800">Daftar di sini</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
