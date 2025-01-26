@extends('layouts.app_modern')

@section('content')
<div class="container py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-6">Daftar Materi</h2>

                <a href="{{ route('admin.materi.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Tambah Materi</a>

                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white shadow-md rounded-md overflow-hidden">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">#</th>
                            <th class="py-2 px-4 border-b text-left">Judul Materi</th>
                            <th class="py-2 px-4 border-b text-left">Kelas</th>
                            <th class="py-2 px-4 border-b text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materi as $item)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $item->judul_materi }}</td>
                                <td class="py-2 px-4 border-b">{{ $item->kelas->nama_kelas }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('admin.materi.edit', $item->id) }}" class="text-yellow-500">Edit</a>
                                    <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
