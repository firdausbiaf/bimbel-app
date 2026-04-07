<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')
        ->as('admin.')
        ->middleware('role:admin')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        });

    Route::prefix('tutor')
        ->as('tutor.')
        ->middleware('role:tutor')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'tutor'])->name('dashboard');
        });

    Route::prefix('student')
        ->as('student.')
        ->middleware('role:student')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'student'])->name('dashboard');
        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
