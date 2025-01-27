<?php

namespace App\Http\Controllers\Admin;

use App\Models\siswa;
use App\Models\Guru;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with(['guru', 'materi'])->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $materi = Materi::all();
        return view('admin.siswa.create', compact('guru', 'materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|unique:siswas',
            'kelas' => 'required|string',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            'guru_id' => 'required|exists:guru,id',
            'materi_id' => 'required|exists:materis,id',
        ]);

        Siswa::create($validated);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa $siswa)
    {
        $gurus = Guru::all();
        $materis = Materi::all();

        return view('admin.siswa.edit', compact('siswa', 'guru', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|unique:siswas,nama_siswa,' . $siswa->id,
            'kelas' => 'required|string',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
            'guru_id' => 'required|exists:guru,id',
            'materi_id' => 'required|exists:materis,id',
        ]);

        $siswa->update($validated);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}