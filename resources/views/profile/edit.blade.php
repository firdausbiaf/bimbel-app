<x-app-layout>
    <x-slot name="header">
        <div class="space-y-1">
            <h2 class="text-2xl font-bold tracking-tight text-slate-950">
                {{ __('Profile') }}
            </h2>
            <p class="text-sm leading-7 text-slate-600">
                Kelola informasi akun, password, dan pengaturan profil Anda.
            </p>
        </div>
    </x-slot>

    <div class="space-y-6">
        <div class="space-y-6">
            <div class="rounded-[1.75rem] border border-white/70 bg-white/90 p-4 shadow-2xl shadow-slate-200/35 backdrop-blur sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-white/70 bg-white/90 p-4 shadow-2xl shadow-slate-200/35 backdrop-blur sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-white/70 bg-white/90 p-4 shadow-2xl shadow-slate-200/35 backdrop-blur sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
