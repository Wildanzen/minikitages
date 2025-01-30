<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserDashboardController;

// Landing page
Route::get('/', function () {
    return view('landing.index');
})->name('landing.index');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// User Routes (Hanya bisa diakses setelah login)
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (Hanya bisa diakses oleh admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Resource routes untuk admin
    Route::resources([
        'guru'  => GuruController::class,
        'kelas' => KelasController::class,
        'materi' => MateriController::class,
        'nilai' => NilaiController::class,
        'siswa' => SiswaController::class,
        'tugas' => TugasController::class,
    ]);
});
