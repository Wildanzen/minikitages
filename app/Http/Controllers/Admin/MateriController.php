<?php

namespace App\Http\Controllers\Admin;

use App\Models\materi;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::with(['kelas'])->get();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('admin.materi.create', compact('guru', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_materi' => 'required|string|unique:materis',
            'kelas_id' => 'required|exists:kelas,id',
            'deskripsi' => 'nullable|string',
        ]);

        Materi::create($validated);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(materi $materi)
    {
        $kelas = Kelas::all();

        return view('admin.materi.edit', compact('materi', 'guru', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, materi $materi)
    {
        $validated = $request->validate([
            'nama_materi' => 'required|string|unique:materis,nama_materi,' . $materi->id,
            'kelas_id' => 'required|exists:kelas,id',
            'deskripsi' => 'nullable|string',
        ]);

        $materi->update($validated);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(materi $materi)
    {
        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
