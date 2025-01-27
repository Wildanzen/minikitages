@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Data Tugas</h3>
        </div>
        <div class="card-body">
            <!-- Tombol Tambah Tugas -->
            <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">Tambah Tugas</a>

            <!-- Tabel Tugas -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Tugas</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tugas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul_tugas }}</td>
                        <td>{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_deadline)->format('d M Y') }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td> <!-- Relasi ke tabel kelas -->
                        <td>
                            <a href="{{ route('tugas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tugas.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada tugas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
