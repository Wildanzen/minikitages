@extends('layouts.app_modern')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Daftar Guru</h1>

    <a href="{{ route('guru.create') }}"
        class="bg-blue-500 text-black px-4 py-2 rounded-md mb-4 inline-block">Tambah Guru</a>

    @if(session('success'))
        <div class="bg-green-500 text-blue p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded-md overflow-hidden">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Nama Guru</th>
                <th class="py-2 px-4 border-b text-left">Status</th>
                <th class="py-2 px-4 border-b text-left">Umur</th>
                <th class="py-2 px-4 border-b text-left">Alamat</th>
                <th class="py-2 px-4 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->nama_guru }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->status }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->umur }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->alamat }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('guru.edit', $item->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
