<?php

namespace App\Http\Controllers;

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
        return view('dashboards.admin', [
            'user' => $request->user(),
        ]);
    }

    public function tutor(Request $request): View
    {
        return view('dashboards.tutor', [
            'user' => $request->user(),
        ]);
    }

    public function student(Request $request): View
    {
        return view('dashboards.student', [
            'user' => $request->user(),
        ]);
    }
}
