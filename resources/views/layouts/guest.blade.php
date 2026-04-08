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
        <div class="auth-background"></div>
        <div class="auth-noise"></div>

        <div class="relative min-h-screen">
            <div class="mx-auto grid min-h-screen max-w-7xl items-center gap-10 px-6 py-10 lg:grid-cols-[1.05fr_0.95fr] lg:px-8">
                <section class="auth-showcase">
                    <a href="/" class="inline-flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 text-lg font-bold text-white shadow-lg shadow-sky-500/30">
                            BM
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-slate-950">{{ config('app.name', 'Bimbel App') }}</p>
                            <p class="text-sm text-slate-500">Smart tutoring workflow for admin, tutor, and student</p>
                        </div>
                    </a>

                    <div class="space-y-6">
                        <div class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/70 px-4 py-2 text-sm font-medium text-sky-700 shadow-sm backdrop-blur">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            Sistem bimbel yang siap berkembang
                        </div>

                        <div class="space-y-4">
                            <h1 class="max-w-2xl text-4xl font-black leading-tight tracking-tight text-slate-950 lg:text-5xl">
                                Pengalaman belajar dan operasional yang lebih rapi, lebih hidup, dan lebih modern.
                            </h1>
                            <p class="max-w-xl text-base leading-8 text-slate-600">
                                Halaman autentikasi dibuat sebagai pintu masuk produk, bukan sekadar form. Tetap ringan, tetapi lebih kuat secara visual dan siap menjadi fondasi aplikasi bimbel Anda.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="auth-metric-card">
                            <p class="auth-metric-value">Classes</p>
                            <p class="auth-metric-copy">Tertata dari awal</p>
                        </div>
                        <div class="auth-metric-card">
                            <p class="auth-metric-value">Tutors</p>
                            <p class="auth-metric-copy">Fokus ke pengajaran</p>
                        </div>
                        <div class="auth-metric-card">
                            <p class="auth-metric-value">Students</p>
                            <p class="auth-metric-copy">Lebih mudah mengikuti progres</p>
                        </div>
                    </div>

                    <div class="auth-floating-card">
                        <p class="auth-floating-tag">Fresh foundation</p>
                        <p class="auth-floating-title">Area autentikasi dirancang menyatu dengan dashboard dan landing page.</p>
                        <p class="auth-floating-copy">Visual yang konsisten membantu aplikasi terasa utuh sejak halaman pertama dibuka.</p>
                    </div>
                </section>

                <section class="auth-panel-wrapper">
                    <div class="auth-panel">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
