<?php

namespace App\Http\Controllers\User;

use App\Models\Tugas;
use App\Models\Materi;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::with(['guru', 'materi'])->get();
        return view('admin.tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $materi = Materi::all();

        return view('admin.tugas.create', compact('guru', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tugas' => 'required|string',
            'guru_id' => 'required|exists:gurus,id',
            'materi_id' => 'required|exists:materis,id',
        ]);

        Tugas::create($validated);

        return redirect()->route('admin.tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        $guru = Guru::all();
        $materi = Materi::all();

        return view('admin.tugas.edit', compact('tugas', 'guru', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        $validated = $request->validate([
            'tugas' => 'required|string,'. $tugas->id,
            'guru_id' => 'required|exists:gurus,id',
            'materi_id' => 'required|exists:materis,id',
        ]);

        $tugas->update($validated);

        return redirect()->route('admin.tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('admin.tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}