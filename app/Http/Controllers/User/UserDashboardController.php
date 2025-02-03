<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Tugas;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalMateri = Materi::count();
        $totalTugas = Tugas::count();

        return view('user.dashboard', compact('totalMateri', 'totalTugas'));
    }
}
