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


        $guru = Guru::orderBy('created_at', 'desc');
        return view('guru.index', compact('guru'));


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
            'nama_guru' => 'required|string|unique:gurus',
            'status' => 'required|in:aktif,nonaktif',
            'umur' => 'required|integer|min:0',
            'alamat' => 'required|string',
        ]);
        Guru::create($validated);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dibuat.');
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

        return view('admin.guru.edit',compact('guru'));

        return view('guru.edit', compact('guru'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|unique:gurus,nama_guru,'.$guru->id,
            'nama_guru' => 'required|string|unique:gurus,nama_guru,' . $guru->id,
            'status' => 'required|in:aktif,nonaktif',
            'umur' => 'required|integer|min:0',
            'alamat' => 'required|string',
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