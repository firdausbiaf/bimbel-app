<x-guest-layout>
    <div class="space-y-8">
        <div class="space-y-3">
            <p class="auth-badge">Create account</p>
            <div class="space-y-2">
                <h2 class="text-3xl font-bold tracking-tight text-slate-950">Daftar untuk mulai belajar</h2>
                <p class="text-sm leading-7 text-slate-600">
                    Buat akun student untuk masuk ke platform bimbel dan mengikuti kelas, materi, tugas, serta assessment.
                </p>
            </div>
        </div>

        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/80 p-4">
            <div class="grid gap-3 sm:grid-cols-3">
                <div class="auth-inline-stat">
                    <p class="auth-inline-label">Schedule</p>
                    <p class="auth-inline-copy">Ikuti agenda kelas</p>
                </div>
                <div class="auth-inline-stat">
                    <p class="auth-inline-label">Materials</p>
                    <p class="auth-inline-copy">Akses materi belajar</p>
                </div>
                <div class="auth-inline-stat">
                    <p class="auth-inline-label">Assessments</p>
                    <p class="auth-inline-copy">Pantau evaluasi belajar</p>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkap" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="space-y-2">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="space-y-4 pt-2">
                <x-primary-button class="w-full justify-center">
                    {{ __('Register') }}
                </x-primary-button>

                <p class="text-center text-sm text-slate-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-sky-700 transition hover:text-sky-800">Masuk di sini</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
