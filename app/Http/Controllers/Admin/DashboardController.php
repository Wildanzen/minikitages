<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalGuru = Guru::count();
        $guruAktif = Guru::where('status', 'aktif')->count();
        $guruNonaktif = Guru::where('status', 'nonaktif')->count();

        $guruSeringOnline = Guru::orderByDesc('login_count')->limit(5)->get();

        return view('admin.dashboard', compact('totalGuru', 'guruAktif', 'guruNonaktif', 'guruSeringOnline'));
    }
}
