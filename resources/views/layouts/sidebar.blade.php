@php
    $user = auth()->user();
    $dashboardRoute = $user?->dashboardRoute();
    $role = $user?->getRoleName();

    $menuGroups = match ($role) {
        \App\Models\User::ROLE_ADMIN => [
            ['label' => 'Dashboard', 'href' => $dashboardRoute],
            ['label' => 'Manage Classes', 'href' => null],
            ['label' => 'Manage Tutors', 'href' => null],
            ['label' => 'Manage Students', 'href' => null],
            ['label' => 'Manage Schedules', 'href' => null],
        ],
        \App\Models\User::ROLE_TUTOR => [
            ['label' => 'Dashboard', 'href' => $dashboardRoute],
            ['label' => 'My Classes', 'href' => null],
            ['label' => 'Attendance', 'href' => null],
            ['label' => 'Materials', 'href' => null],
            ['label' => 'Assignments', 'href' => null],
            ['label' => 'Assessments', 'href' => null],
        ],
        \App\Models\User::ROLE_STUDENT => [
            ['label' => 'Dashboard', 'href' => $dashboardRoute],
            ['label' => 'My Classes', 'href' => null],
            ['label' => 'Schedules', 'href' => null],
            ['label' => 'Materials', 'href' => null],
            ['label' => 'Assignments', 'href' => null],
            ['label' => 'Assessments', 'href' => null],
        ],
        default => [],
    };
@endphp

<aside class="w-full shrink-0 lg:sticky lg:top-28 lg:w-80">
    <div class="overflow-hidden rounded-[1.8rem] border border-white/70 bg-white/86 shadow-[0_24px_60px_-38px_rgba(15,23,42,0.35)] backdrop-blur">
        <div class="border-b border-gray-100 px-5 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-700">Navigation</p>
            <p class="mt-1 text-lg font-semibold text-gray-900">{{ ucfirst($role ?? 'user') }} Workspace</p>
            <p class="mt-1 text-sm leading-6 text-gray-600">Navigasi utama yang siap berkembang bersama modul akademik berikutnya.</p>
        </div>

        <div class="border-b border-gray-100 px-5 py-4">
            <div class="rounded-[1.35rem] bg-gradient-to-br from-slate-950 to-slate-800 p-4 text-white">
                <p class="text-xs uppercase tracking-[0.22em] text-slate-300">Active Role</p>
                <p class="mt-2 text-lg font-semibold">{{ ucfirst($role ?? 'User') }}</p>
                <p class="mt-2 text-sm leading-6 text-slate-300">Layout ini disiapkan sebagai fondasi untuk modul per role berikutnya.</p>
            </div>
        </div>

        <nav class="space-y-2 p-4">
            @foreach ($menuGroups as $item)
                @php
                    $isActive = $item['href'] && url()->current() === $item['href'];
                @endphp

                @if ($item['href'])
                    <a
                        href="{{ $item['href'] }}"
                        class="{{ $isActive ? 'bg-slate-900 text-white shadow-[0_16px_30px_-18px_rgba(15,23,42,0.55)]' : 'bg-white/50 text-gray-700 hover:bg-sky-50 hover:text-sky-800' }} block rounded-2xl px-4 py-3.5 text-sm font-medium transition"
                    >
                        {{ $item['label'] }}
                    </a>
                @else
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/75 px-4 py-3.5 text-sm text-gray-500">
                        <p class="font-medium text-gray-700">{{ $item['label'] }}</p>
                        <p class="mt-1 text-xs text-gray-500">Placeholder menu for next module.</p>
                    </div>
                @endif
            @endforeach
        </nav>

        <div class="m-4 rounded-[1.4rem] bg-gradient-to-br from-sky-500 to-cyan-400 p-5 text-white shadow-lg shadow-sky-500/20">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-white/80">Next Build</p>
            <p class="mt-2 text-lg font-semibold">UI foundation is ready</p>
            <p class="mt-2 text-sm leading-6 text-white/85">Halaman inti sudah siap menjadi dasar untuk classes, materials, assignments, dan assessments.</p>
        </div>
    </div>
</aside>
