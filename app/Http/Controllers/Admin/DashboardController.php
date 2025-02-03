<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count();
        $guruAktif = Guru::where('status', 'aktif')->count();
        $guruNonaktif = Guru::where('status', 'nonaktif')->count();

        // Data per bulan untuk guru aktif dan nonaktif
        $guruAktifBulan1 = Guru::where('status', 'aktif')
            ->whereMonth('created_at', 1) // Januari
            ->count();
        $guruAktifBulan2 = Guru::where('status', 'aktif')
            ->whereMonth('created_at', 2) // Februari
            ->count();
        $guruAktifBulan3 = Guru::where('status', 'aktif')
            ->whereMonth('created_at', 3) // Maret
            ->count();

        $guruNonaktifBulan1 = Guru::where('status', 'nonaktif')
            ->whereMonth('created_at', 1) // Januari
            ->count();
        $guruNonaktifBulan2 = Guru::where('status', 'nonaktif')
            ->whereMonth('created_at', 2) // Februari
            ->count();
        $guruNonaktifBulan3 = Guru::where('status', 'nonaktif')
            ->whereMonth('created_at', 3) // Maret
            ->count();

        $guruSeringOnline = Guru::orderByDesc('login_count')->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalGuru',
            'guruAktif',
            'guruNonaktif',
            'guruSeringOnline',
            'guruAktifBulan1',
            'guruAktifBulan2',
            'guruAktifBulan3',
            'guruNonaktifBulan1',
            'guruNonaktifBulan2',
            'guruNonaktifBulan3'
        ));
    }
}
