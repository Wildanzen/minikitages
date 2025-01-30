@extends('layouts.app_modern')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Detail Tugas</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.tugas.index') }}" class="btn btn-secondary mb-3">Kembali</a>

            <table class="table table-bordered">
                <tr>
                    <th>Judul Tugas</th>
                    <td>{{ $tugas->judul_tugas }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $tugas->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                </tr>
                <tr>
                    <th>Deadline</th>
                    <td>{{ \Carbon\Carbon::parse($tugas->tanggal_deadline)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Siswa</th>
                    <td>{{ $tugas->siswa->nama_siswa }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
