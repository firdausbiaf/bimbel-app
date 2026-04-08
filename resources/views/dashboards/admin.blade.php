<x-app-layout>
    <x-slot name="header">
        <div class="space-y-2">
            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">Workspace</p>
            <h2 class="text-2xl font-bold tracking-tight text-slate-950">
                {{ $title }}
            </h2>
            <p class="text-sm leading-7 text-slate-600">
                {{ $description }}
            </p>
        </div>
    </x-slot>

    @include('dashboards.partials.role-dashboard-content', [
        'user' => $user,
        'spotlight' => $spotlight,
        'statItems' => $statItems,
        'menuItems' => $menuItems,
    ])
</x-app-layout>
