@extends('layouts.app_modern')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Edit Guru</h1>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_guru" class="block text-sm font-medium text-gray-700">Nama Guru</label>
            <input type="text" name="nama_guru" id="nama_guru"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                value="{{ old('nama_guru', $guru->nama_guru) }}" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="aktif" {{ $guru->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $guru->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
            <input type="number" name="umur" id="umur" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                value="{{ old('umur', $guru->umur) }}" required min="0">
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                required>{{ old('alamat', $guru->alamat) }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
    </form>
</div>
@endsection
