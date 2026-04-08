<div class="space-y-6">
    <section class="overflow-hidden rounded-[2rem] border border-white/70 bg-white/88 p-6 shadow-[0_28px_80px_-40px_rgba(15,23,42,0.34)] backdrop-blur">
        <div class="grid gap-4 xl:grid-cols-[1.25fr_0.75fr]">
            <div class="relative overflow-hidden rounded-[1.75rem] bg-slate-950 p-7 text-white">
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r {{ $spotlight['accent'] }}"></div>
                <div class="absolute -right-10 -top-14 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-16 left-0 h-36 w-36 rounded-full bg-sky-400/20 blur-2xl"></div>

                <div class="relative space-y-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-slate-300">{{ $spotlight['eyebrow'] }}</p>
                    <div class="space-y-3">
                        <p class="text-3xl font-black leading-tight">{{ $spotlight['headline'] }}</p>
                        <p class="max-w-2xl text-sm leading-7 text-slate-300">{{ $spotlight['copy'] }}</p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <span class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium">
                            {{ $user->name }}
                        </span>
                        <span class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium uppercase">
                            {{ $user->getRoleName() }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid gap-4">
                <div class="rounded-[1.5rem] bg-gradient-to-br from-sky-50 to-cyan-50 p-5">
                    <p class="text-sm font-medium text-sky-700">Account</p>
                    <p class="mt-2 text-xl font-semibold text-slate-900">{{ $user->name }}</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $user->email }}</p>
                </div>

                <div class="rounded-[1.5rem] bg-gradient-to-br from-amber-50 to-orange-50 p-5">
                    <p class="text-sm font-medium text-amber-700">Role Access</p>
                    <p class="mt-2 text-xl font-semibold uppercase text-slate-900">{{ $user->getRoleName() }}</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600">Shortcut dan navigasi utama menyesuaikan role yang sedang aktif.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-4 md:grid-cols-3">
        @foreach ($statItems as $item)
            <div class="rounded-[1.6rem] border border-white/70 bg-white/88 p-5 shadow-[0_18px_45px_-35px_rgba(15,23,42,0.45)] backdrop-blur">
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">{{ $item['label'] }}</p>
                <p class="mt-3 text-2xl font-bold text-slate-950">{{ $item['value'] }}</p>
                <p class="mt-3 text-sm leading-6 text-slate-600">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="space-y-4">
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
            <h3 class="text-xl font-semibold text-slate-900">Main Menu</h3>
            <p class="text-sm leading-7 text-slate-600">Shortcut area kerja utama dengan visual yang lebih siap untuk pengembangan modul selanjutnya.</p>
            </div>
            <span class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Quick Access</span>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($menuItems as $item)
                <x-dashboard-menu-card
                    :title="$item['title']"
                    :description="$item['description']"
                    :tag="$item['tag']"
                    :tone="$item['tone']"
                />
            @endforeach
        </div>
    </section>
</div>
