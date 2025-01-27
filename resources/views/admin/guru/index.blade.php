@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h5 class="card-header">Daftar Guru</h5>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nama Guru</th>
                        <th>Status</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                    <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $pasien->links() !!} --}}
        </div>
    </div>
@endsection
