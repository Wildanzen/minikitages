<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;
use Illuminate\Support\Facades\Auth;

// Landing page
Route::get('/', function () {
    return view('landing.index');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('landing.index');
})->name('logout');


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('nilai', NilaiController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('error', ErrorController::class);
});

// Authentication routes
require __DIR__ . '/auth.php';
