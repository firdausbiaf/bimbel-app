<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[var(--bg-soft)] text-gray-900">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(14,165,233,0.08),_transparent_24%),radial-gradient(circle_at_bottom_right,_rgba(249,115,22,0.08),_transparent_20%)]">
            <div class="pointer-events-none fixed inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(14,165,233,0.14),_transparent_25%),radial-gradient(circle_at_top_right,_rgba(249,115,22,0.12),_transparent_20%),linear-gradient(180deg,_rgba(248,250,252,0.92),_rgba(244,247,251,0.96))]"></div>
            @include('layouts.navigation')

            <div class="relative mx-auto flex max-w-7xl flex-col gap-6 px-4 py-6 sm:px-6 lg:flex-row lg:items-start lg:px-8">
                @auth
                    @include('layouts.sidebar')
                @endauth

                <div class="flex-1 space-y-6">
                    @if (isset($header))
                        <header class="rounded-[1.8rem] border border-white/70 bg-white/88 px-6 py-5 shadow-[0_22px_55px_-34px_rgba(15,23,42,0.35)] backdrop-blur">
                            {{ $header }}
                        </header>
                    @endif

                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
