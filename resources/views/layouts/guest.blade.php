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
    <body class="auth-shell">
        <div class="relative min-h-screen overflow-x-hidden">
            <div class="auth-background pointer-events-none absolute inset-0"></div>
            <div class="auth-noise pointer-events-none absolute inset-0"></div>

            <div class="relative z-10 mx-auto flex min-h-screen max-w-7xl items-start justify-center px-6 py-8 sm:py-10 lg:items-center lg:px-8 lg:py-12">
                <section class="w-full max-w-xl py-4 sm:py-6">
                    <div class="mb-6 flex justify-center">
                        <a href="/" class="inline-flex items-center gap-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 text-lg font-bold text-white shadow-lg shadow-sky-500/30">
                                BM
                            </div>
                            <div>
                                <p class="text-lg font-semibold text-slate-950">{{ config('app.name', 'Bimbel App') }}</p>
                                <p class="text-sm text-slate-500">Smart tutoring workflow</p>
                            </div>
                        </a>
                    </div>

                    <div class="auth-panel">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
