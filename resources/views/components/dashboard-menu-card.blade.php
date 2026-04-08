@props([
    'title',
    'description',
    'tag' => 'Module',
    'tone' => 'sky',
])

@php
    $toneClasses = match ($tone) {
        'amber' => 'from-amber-100 to-orange-50 text-amber-700 ring-amber-200',
        'emerald' => 'from-emerald-100 to-teal-50 text-emerald-700 ring-emerald-200',
        'violet' => 'from-violet-100 to-fuchsia-50 text-violet-700 ring-violet-200',
        'rose' => 'from-rose-100 to-pink-50 text-rose-700 ring-rose-200',
        default => 'from-sky-100 to-cyan-50 text-sky-700 ring-sky-200',
    };
@endphp

<div class="group rounded-[1.9rem] border border-white/70 bg-white/90 p-6 shadow-[0_20px_45px_-28px_rgba(15,23,42,0.28)] backdrop-blur transition duration-300 hover:-translate-y-1.5 hover:shadow-[0_28px_55px_-30px_rgba(15,23,42,0.34)]">
    <div class="space-y-4">
        <div class="flex items-start justify-between gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br {{ $toneClasses }} text-sm font-bold ring-1">
                {{ strtoupper(substr($title, 0, 2)) }}
            </div>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-500">{{ $tag }}</span>
        </div>

        <div class="space-y-2">
            <p class="text-lg font-semibold text-slate-900">{{ $title }}</p>
            <p class="text-sm leading-7 text-slate-600">{{ $description }}</p>
        </div>

        <div class="flex items-center justify-between pt-2">
            <span class="text-xs font-medium uppercase tracking-[0.22em] text-slate-400">Placeholder Module</span>
            <span class="text-sm font-semibold text-slate-500 transition group-hover:text-slate-900">Explore</span>
        </div>
    </div>
</div>
