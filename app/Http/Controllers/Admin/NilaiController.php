<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nilai;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = Nilai::with(['guru', 'siswa', 'tugas'])->get();
        return view('admin.nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $tugas = Tugas::all();

        return view('admin.nilai.create', compact('guru', 'siswa', 'tugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
            'guru_id' => 'required|exists:guru,id',
            'siswa_id' => 'required|exists:siswa,id',
            'tugas_id' => 'required|exists:tugas,id',
        ]);

        Nilai::create($validated);

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $tugas = Tugas::all();

        return view('admin.nilai.edit', compact('nilai', 'guru', 'siswa', 'tugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100,'.$nilai->id,
            'guru_id' => 'required|exists:guru,id',
            'siswa_id' => 'required|exists:siswa,id',
            'tugas_id' => 'required|exists:tugas,id',
        ]);

        $nilai->update($validated);

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}