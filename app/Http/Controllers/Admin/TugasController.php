<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tugas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::with('siswa')->get(); // Mengambil data tugas dengan relasi siswa
        return view('admin.tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all(); // Mengambil semua siswa untuk dropdown pilihan
        return view('admin.tugas.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_tugas' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'siswa_id' => 'required|exists:siswa,id', // Memastikan siswa_id ada di tabel siswa
        ]);

        Tugas::create($validated);

        return redirect()->route('admin.tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        return view('admin.tugas.show', compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        $siswa = Siswa::all(); // Mengambil daftar siswa untuk dropdown
        return view('admin.tugas.edit', compact('tugas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        $validated = $request->validate([
            'judul_tugas' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'siswa_id' => 'required|exists:siswa,id',
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