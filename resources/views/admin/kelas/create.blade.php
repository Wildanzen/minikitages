@extends('layouts.app_modern')
@section('content')
<style>
    .bg-grey {
        background-color: #ededed;
        color: white;
    }

    .card,
    .card-header,
    .card-body,
    th,
    td,
    .form-control,
    .btn {
        font-weight: bold;
    }

    #searchInput {
        font-weight: bold;
    }
</style>

<div class="card">
    <h5 class="card-header bg-grey text-black">Tambah Kelas</h5>
    <div class="card-body">
        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select class="form-control" id="guru_id" name="guru_id" required>
                    <option value="">Pilih Guru</option>
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-4">
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <a href="{{ route('admin.kelas.index') }}" class="btn btn-warning ms-3">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
