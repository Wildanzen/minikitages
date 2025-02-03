<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['guru'])->get();
        $guru = Guru::all();
        return view('admin.kelas.index', compact('kelas','guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();

        return view('admin.kelas.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
    'nama_kelas' => 'required|string|unique:kelas',
    'guru_id' => 'required|exists:guru,id',
    ]);

    Kelas::create($validated);

    return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        $kelas->load(['guru']); // Pastikan relasi guru dan siswa ikut dimuat

        return view('admin.kelas.show', compact('kelas'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $guru = Guru::all();

        return view('admin.kelas.edit', compact('kelas', 'guru' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas,' . $kelas->id,
            'guru_id' => 'required|exists:guru,id',
        ]);

        $kelas->update($validated);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
