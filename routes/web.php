<?php

use App\Http\Middleware\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\User\UserTugasController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\UserMateriController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Landing page
Route::get('/', function () {
    return view('landing.index');
})->name('landing.index');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Jika ingin menambahkan register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// User Routes (Hanya bisa diakses setelah login)
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (Hanya bisa diakses oleh admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes untuk admin
        Route::resource('/guru', GuruController::class);
        Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
        Route::get('kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::put('kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
        Route::patch('kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
        Route::resource('/materi', MateriController::class);
        Route::resource('/nilai', NilaiController::class);
        Route::resource('/siswa', SiswaController::class);
        Route::get('tugas', [TugasController::class, 'index'])->name('tugas.index');
        Route::get('tugas/create', [TugasController::class, 'create'])->name('tugas.create');
        Route::post('tugas', [TugasController::class, 'store'])->name('tugas.store');
        Route::get('tugas/{tugas}', [TugasController::class, 'show'])->name('tugas.show');
        Route::get('tugas/{tugas}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
        Route::put('tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');
        Route::patch('tugas/{tugas}', [TugasController::class, 'update'])->name('tugas.update');
        Route::delete('tugas/{tugas}', [TugasController::class, 'destroy'])->name('tugas.destroy');

});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard');

    // Rute untuk Materi
    Route::get('/materi', [UserMateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [UserMateriController::class, 'show'])->name('materi.show');

    // Rute untuk Tugas
    Route::get('/tugas', [UserTugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}', [UserTugasController::class, 'show'])->name('tugas.show');
    Route::post('/tugas/{id}/submit', [UserTugasController::class, 'submit'])->name('tugas.submit');
});