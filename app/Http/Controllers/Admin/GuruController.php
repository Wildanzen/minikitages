<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|unique:guru',
            'status' => 'required|in:aktif,nonaktif',
            'umur' => 'required|integer|min:1',
            'alamat' => 'required|string',
        ], [
            'nama_guru.required' => 'Nama guru tidak boleh kosong.',
            'umur.required' => 'Umur tidak boleh kosong.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
        ]);
        Guru::create($request->all());

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {

        return view('admin.guru.edit', compact('guru'))->with('success', 'Silakan edit data guru.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|unique:guru,nama_guru,'.$guru->id,
            'status' => 'required|in:aktif,nonaktif',
            'umur' => 'required|integer|min:0',
            'alamat' => 'required|string',
        ], [
            'nama_guru.required' => 'Nama guru tidak boleh kosong.',
            'umur.required' => 'Umur tidak boleh kosong.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
        ]);

        $guru->update($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil di edit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil di hapus.');
    }
}
