@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Siswa</h1>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ ucfirst($siswa->status) }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
