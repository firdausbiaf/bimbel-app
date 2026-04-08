<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        return redirect()->to($request->user()->dashboardRoute());
    }

    public function admin(Request $request): View
    {
        return $this->renderDashboard(
            request: $request,
            view: 'dashboards.admin',
            title: 'Admin Dashboard',
            description: 'Kelola data utama sistem bimbel dari satu tempat.',
            spotlight: [
                'eyebrow' => 'Control Center',
                'headline' => 'Pantau operasional bimbel dengan tampilan yang lebih terarah.',
                'copy' => 'Area admin dirancang sebagai pusat koordinasi untuk kelas, tutor, student, dan jadwal pembelajaran.',
                'accent' => 'from-sky-500 via-cyan-400 to-teal-300',
            ],
            statItems: [
                ['label' => 'Classes', 'value' => 'Manage', 'description' => 'Struktur kelas dan alur belajar.'],
                ['label' => 'Tutors', 'value' => 'Assign', 'description' => 'Pengajar dan penugasan mengajar.'],
                ['label' => 'Schedules', 'value' => 'Plan', 'description' => 'Jadwal yang siap dikelola.'],
            ],
            menuItems: [
                ['title' => 'Manage Classes', 'description' => 'Kelola data kelas dan pembagian belajar.', 'tag' => 'Core', 'tone' => 'sky'],
                ['title' => 'Manage Tutors', 'description' => 'Kelola data tutor dan penugasan mengajar.', 'tag' => 'People', 'tone' => 'amber'],
                ['title' => 'Manage Students', 'description' => 'Kelola data siswa dan status keanggotaannya.', 'tag' => 'Members', 'tone' => 'emerald'],
                ['title' => 'Manage Schedules', 'description' => 'Kelola jadwal belajar dan agenda kelas.', 'tag' => 'Planning', 'tone' => 'violet'],
            ],
        );
    }

    public function tutor(Request $request): View
    {
        return $this->renderDashboard(
            request: $request,
            view: 'dashboards.tutor',
            title: 'Tutor Dashboard',
            description: 'Akses area kerja tutor untuk kelas, materi, dan penilaian.',
            spotlight: [
                'eyebrow' => 'Teaching Flow',
                'headline' => 'Masuk ke workspace pengajaran yang lebih fokus dan siap pakai.',
                'copy' => 'Dari absensi sampai assessment, semua shortcut utama tutor disiapkan untuk aktivitas kelas harian.',
                'accent' => 'from-orange-500 via-amber-400 to-yellow-300',
            ],
            statItems: [
                ['label' => 'Classes', 'value' => 'My List', 'description' => 'Kelas yang Anda ampu.'],
                ['label' => 'Attendance', 'value' => 'Track', 'description' => 'Pantau kehadiran siswa.'],
                ['label' => 'Materials', 'value' => 'Share', 'description' => 'Materi dan tugas lebih terstruktur.'],
            ],
            menuItems: [
                ['title' => 'My Classes', 'description' => 'Lihat kelas yang Anda ampu.', 'tag' => 'Teaching', 'tone' => 'sky'],
                ['title' => 'Attendance', 'description' => 'Kelola absensi pertemuan siswa.', 'tag' => 'Routine', 'tone' => 'emerald'],
                ['title' => 'Materials', 'description' => 'Kelola materi pembelajaran kelas.', 'tag' => 'Content', 'tone' => 'violet'],
                ['title' => 'Assignments', 'description' => 'Kelola tugas dan pengumpulan siswa.', 'tag' => 'Tasks', 'tone' => 'amber'],
                ['title' => 'Assessments', 'description' => 'Kelola kuis, ujian, dan penilaian.', 'tag' => 'Review', 'tone' => 'rose'],
            ],
        );
    }

    public function student(Request $request): View
    {
        return $this->renderDashboard(
            request: $request,
            view: 'dashboards.student',
            title: 'Student Dashboard',
            description: 'Pantau aktivitas belajar, materi, dan tugas Anda.',
            spotlight: [
                'eyebrow' => 'Learning Journey',
                'headline' => 'Ruang belajar yang lebih jelas untuk jadwal, materi, dan target tugas.',
                'copy' => 'Student dashboard disiapkan sebagai titik masuk yang ringan, rapi, dan mudah dipahami untuk aktivitas harian.',
                'accent' => 'from-violet-500 via-fuchsia-400 to-pink-300',
            ],
            statItems: [
                ['label' => 'Schedules', 'value' => 'Ready', 'description' => 'Lihat agenda belajar Anda.'],
                ['label' => 'Assignments', 'value' => 'Focus', 'description' => 'Pantau tugas yang berjalan.'],
                ['label' => 'Assessments', 'value' => 'Prepare', 'description' => 'Persiapan evaluasi lebih terarah.'],
            ],
            menuItems: [
                ['title' => 'My Classes', 'description' => 'Lihat kelas yang sedang Anda ikuti.', 'tag' => 'Classes', 'tone' => 'sky'],
                ['title' => 'Schedules', 'description' => 'Lihat jadwal belajar dan pertemuan kelas.', 'tag' => 'Plan', 'tone' => 'violet'],
                ['title' => 'Materials', 'description' => 'Akses materi pembelajaran dari tutor.', 'tag' => 'Learn', 'tone' => 'emerald'],
                ['title' => 'Assignments', 'description' => 'Lihat tugas dan status pengumpulan.', 'tag' => 'Tasks', 'tone' => 'amber'],
                ['title' => 'Assessments', 'description' => 'Lihat kuis dan ujian yang tersedia.', 'tag' => 'Practice', 'tone' => 'rose'],
            ],
        );
    }

    private function renderDashboard(
        Request $request,
        string $view,
        string $title,
        string $description,
        array $spotlight,
        array $statItems,
        array $menuItems
    ): View {
        return view($view, [
            'user' => $request->user(),
            'title' => $title,
            'description' => $description,
            'spotlight' => $spotlight,
            'statItems' => $statItems,
            'menuItems' => $menuItems,
        ]);
    }
}
