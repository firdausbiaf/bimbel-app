<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bimbel App') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--bg-soft)] text-slate-900 antialiased">
        <div class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(14,165,233,0.20),_transparent_30%),radial-gradient(circle_at_top_right,_rgba(249,115,22,0.17),_transparent_25%),linear-gradient(180deg,_#f6fbff_0%,_#f7f5ff_36%,_#f7fafc_100%)]"></div>
            <div class="pointer-events-none absolute inset-x-0 top-0 h-[36rem] bg-[radial-gradient(circle_at_center,_rgba(255,255,255,0.55),_transparent_65%)]"></div>

            <header class="relative z-10">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-6 lg:px-8">
                    <a href="/" class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-400 text-lg font-bold text-white shadow-lg shadow-sky-500/25">
                            BM
                        </div>
                        <div>
                            <p class="text-lg font-semibold text-slate-900">Bimbel App</p>
                            <p class="text-sm text-slate-500">Learning management for classes, tutors, and students</p>
                        </div>
                    </a>

                    <div class="flex items-center gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-sky-200 hover:text-sky-700">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-sky-200 hover:text-sky-700">
                                Login
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-slate-900/15 transition hover:bg-slate-800">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </header>

            <main class="relative z-10">
                <section class="mx-auto grid max-w-7xl gap-14 px-6 pb-20 pt-10 lg:grid-cols-[1.1fr_0.9fr] lg:px-8 lg:pb-24 lg:pt-16">
                    <div class="space-y-8">
                        <div class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-sm font-medium text-sky-700 shadow-sm backdrop-blur">
                            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                            Platform bimbel untuk operasional kelas dan pembelajaran harian
                        </div>

                        <div class="space-y-6">
                            <h1 class="max-w-3xl text-5xl font-black leading-tight tracking-tight text-slate-950 lg:text-6xl">
                                Kelola bimbel, materi, tugas, dan evaluasi dalam satu sistem yang terasa hidup.
                            </h1>
                            <p class="max-w-2xl text-lg leading-8 text-slate-600">
                                Bimbel App membantu admin, tutor, dan student bekerja dalam alur yang lebih rapi. Mulai dari kelas, jadwal, absensi, materi, tugas, hingga assessment, semuanya siap tumbuh dalam satu fondasi produk yang konsisten.
                            </p>
                        </div>

                        <div class="flex flex-col gap-4 sm:flex-row">
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-7 py-4 text-base font-semibold text-white shadow-xl shadow-slate-900/15 transition hover:-translate-y-0.5 hover:bg-slate-800">
                                Masuk ke sistem
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-7 py-4 text-base font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-sky-200 hover:text-sky-700">
                                    Buat akun student
                                </a>
                            @endif
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div class="landing-mini-card">
                                <p class="landing-mini-value">3 Role</p>
                                <p class="landing-mini-label">Admin, Tutor, Student</p>
                            </div>
                            <div class="landing-mini-card">
                                <p class="landing-mini-value">1 Alur</p>
                                <p class="landing-mini-label">Operasional dan pembelajaran terhubung</p>
                            </div>
                            <div class="landing-mini-card">
                                <p class="landing-mini-value">Fresh UI</p>
                                <p class="landing-mini-label">Fondasi tampilan siap dikembangkan</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute -left-10 top-10 h-40 w-40 rounded-full bg-sky-300/25 blur-3xl"></div>
                        <div class="absolute -right-8 bottom-16 h-44 w-44 rounded-full bg-orange-300/20 blur-3xl"></div>

                        <div class="landing-showcase">
                            <div class="landing-showcase-top">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">Daily Learning Overview</p>
                                    <p class="text-sm text-slate-500">Dashboard snapshot for modern tutoring operations</p>
                                </div>
                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                    Active Today
                                </span>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="showcase-panel bg-slate-950 text-white">
                                    <p class="text-sm font-medium text-slate-300">Kelas aktif</p>
                                    <p class="mt-3 text-4xl font-bold">12</p>
                                    <p class="mt-3 text-sm text-slate-400">Terpantau dari jadwal, tutor, dan student yang terhubung.</p>
                                </div>

                                <div class="showcase-stack">
                                    <div class="showcase-tile">
                                        <p class="showcase-kicker">Attendance</p>
                                        <p class="showcase-title">Presensi harian lebih cepat</p>
                                        <p class="showcase-copy">Tutor mencatat kehadiran tanpa alur manual yang berantakan.</p>
                                    </div>
                                    <div class="showcase-tile">
                                        <p class="showcase-kicker">Assignments</p>
                                        <p class="showcase-title">Tugas dan materi lebih terstruktur</p>
                                        <p class="showcase-copy">Student bisa fokus pada kelas, materi, dan deadline yang jelas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.5rem] border border-slate-200 bg-gradient-to-r from-sky-50 via-white to-orange-50 p-5">
                                <div class="grid gap-4 md:grid-cols-[0.9fr_1.1fr] md:items-center">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">Designed for growth</p>
                                        <p class="mt-2 text-xl font-semibold text-slate-950">Dari landing page sampai dashboard, semua dirancang dengan bahasa visual yang sama.</p>
                                    </div>
                                    <p class="text-sm leading-7 text-slate-600">
                                        Tujuannya bukan sekadar tampilan cantik, tetapi UI yang terasa seperti produk bimbel sungguhan dan siap dilanjutkan ke modul operasional berikutnya.
                                    </p>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="showcase-stat">
                                    <p class="showcase-stat-value">Admin</p>
                                    <p class="showcase-stat-label">Kontrol kelas, tutor, dan jadwal</p>
                                </div>
                                <div class="showcase-stat">
                                    <p class="showcase-stat-value">Tutor</p>
                                    <p class="showcase-stat-label">Kelola materi, absensi, tugas, assessment</p>
                                </div>
                                <div class="showcase-stat">
                                    <p class="showcase-stat-value">Student</p>
                                    <p class="showcase-stat-label">Belajar lewat jadwal, materi, dan penugasan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mx-auto max-w-7xl px-6 py-10 lg:px-8">
                    <div class="grid gap-6 lg:grid-cols-3">
                        <div class="role-card">
                            <p class="role-card-tag">Admin</p>
                            <h3 class="role-card-title">Mengontrol operasional inti</h3>
                            <p class="role-card-copy">Kelola kelas, tutor, student, dan jadwal dari workspace yang terstruktur.</p>
                        </div>
                        <div class="role-card">
                            <p class="role-card-tag">Tutor</p>
                            <h3 class="role-card-title">Mengajar dengan alur yang fokus</h3>
                            <p class="role-card-copy">Akses absensi, materi, tugas, dan assessment tanpa berpindah-pindah konteks.</p>
                        </div>
                        <div class="role-card">
                            <p class="role-card-tag">Student</p>
                            <h3 class="role-card-title">Belajar dari dashboard yang jelas</h3>
                            <p class="role-card-copy">Lihat kelas, jadwal, materi, dan tugas dalam satu pengalaman yang lebih rapi.</p>
                        </div>
                    </div>
                </section>

                <section class="relative z-10 mx-auto max-w-7xl px-6 pb-10 lg:px-8">
                    <div class="grid gap-6 lg:grid-cols-3">
                        <div class="feature-card">
                            <div class="feature-icon bg-sky-100 text-sky-700">CL</div>
                            <h2 class="feature-title">Kelola kelas dengan jelas</h2>
                            <p class="feature-copy">Bangun struktur kelas, tetapkan tutor, dan atur student dalam satu tempat yang mudah dipantau.</p>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon bg-amber-100 text-amber-700">AT</div>
                            <h2 class="feature-title">Aktivitas belajar terhubung</h2>
                            <p class="feature-copy">Absensi, materi, tugas, dan assessment tidak lagi terpisah-pisah antar proses harian.</p>
                        </div>

                        <div class="feature-card">
                            <div class="feature-icon bg-emerald-100 text-emerald-700">GR</div>
                            <h2 class="feature-title">Siap tumbuh jadi produk penuh</h2>
                            <p class="feature-copy">UI dan struktur halaman disusun sebagai fondasi realistis untuk pengembangan modul berikutnya.</p>
                        </div>
                    </div>
                </section>

                <section class="mx-auto max-w-7xl px-6 py-14 lg:px-8">
                    <div class="rounded-[2rem] border border-slate-200 bg-white/80 p-8 shadow-xl shadow-slate-200/40 backdrop-blur lg:p-10">
                        <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:justify-between">
                            <div class="max-w-2xl space-y-3">
                                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-sky-700">Why this product</p>
                                <h2 class="text-3xl font-bold tracking-tight text-slate-950">Dirancang untuk alur belajar yang praktis, bukan hanya halaman admin biasa.</h2>
                                <p class="text-base leading-8 text-slate-600">
                                    Tampilan yang rapi membantu tim internal bekerja lebih cepat, sementara student mendapat pengalaman yang lebih fokus dan tidak membingungkan.
                                </p>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-2">
                                <div class="reason-pill">Branding bimbel lebih terasa sebagai produk</div>
                                <div class="reason-pill">Navigasi lintas role lebih konsisten</div>
                                <div class="reason-pill">Dasbor siap diisi modul berikutnya</div>
                                <div class="reason-pill">Auth page tampil lebih profesional</div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
