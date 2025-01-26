<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Admin\MateriController;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(
    function () {
        Route::resource('guru', GuruController::class)->middleware(Admin::class);
        Route::resource('kelas', KelasController::class)->middleware(Admin::class);
        Route::resource('materi', MateriController::class)->middleware(Admin::class);
        Route::resource('nilai', NilaiController::class)->middleware(Admin::class);
        Route::resource('siswa', SiswaController::class)->middleware(Admin::class);
        Route::resource('tugas', TugasController::class)->middleware(Admin::class);
    }
);




require __DIR__ . '/auth.php';
