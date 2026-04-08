<nav x-data="{ openUserMenu: false }" class="sticky top-0 z-30 border-b border-white/70 bg-white/78 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 shadow-lg shadow-sky-500/20">
                    <x-application-logo class="h-7 w-7 fill-current text-white" />
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-900">{{ config('app.name', 'Bimbel App') }}</p>
                    <p class="text-xs text-gray-500">Tutoring workspace</p>
                </div>
            </a>
        </div>

        @auth
            @php
                $user = Auth::user();
                $initials = collect(explode(' ', trim($user->name)))
                    ->filter()
                    ->take(2)
                    ->map(fn (string $part) => strtoupper(substr($part, 0, 1)))
                    ->implode('');
            @endphp

            <div class="relative">
                <button
                    type="button"
                    @click="openUserMenu = !openUserMenu"
                    class="flex items-center gap-3 rounded-2xl border border-white/70 bg-white/86 px-3 py-2.5 shadow-[0_16px_38px_-24px_rgba(15,23,42,0.34)] transition hover:bg-white"
                >
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-slate-900 to-slate-700 text-sm font-semibold text-white">
                        {{ $initials }}
                    </div>

                    <div class="hidden text-left sm:block">
                        <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                        <p class="text-xs uppercase tracking-wide text-gray-500">{{ $user->getRoleName() }}</p>
                    </div>

                    <svg class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div
                    x-cloak
                    x-show="openUserMenu"
                    @click.outside="openUserMenu = false"
                    x-transition
                    class="absolute right-0 mt-3 w-60 overflow-hidden rounded-[1.25rem] border border-white/80 bg-white/96 shadow-[0_24px_60px_-28px_rgba(15,23,42,0.4)] backdrop-blur"
                >
                    <div class="border-b border-slate-100 px-4 py-4">
                        <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>

                    <div class="p-2">
                        <a
                            href="{{ route('profile.edit') }}"
                            class="block rounded-xl px-3 py-2.5 text-sm text-gray-700 transition hover:bg-gray-100"
                        >
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="block w-full rounded-xl px-3 py-2.5 text-left text-sm text-gray-700 transition hover:bg-gray-100"
                            >
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</nav>
