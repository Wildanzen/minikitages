@extends('layouts.app_modern')

@section('content')
<style>
    .bg-grey {
        background-color: #ededed;
        color: black;
    }

    /* Menebalkan seluruh teks dalam card */
    .card,
    .card-header,
    .card-body,
    th,
    td,
    .form-control,
    .btn {
        font-weight: bold;
    }

    /* Menebalkan teks pada input search */
    #searchInput {
        font-weight: bold;
    }
</style>

<div class="card">
    <h5 class="card-header bg-grey text-black">Tambah Tugas</h5>
    <div class="card-body">
        <form action="{{ route('admin.tugas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul_tugas" class="form-label">Judul Tugas</label>
                <input type="text" name="judul_tugas" id="judul_tugas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal_deadline" class="form-label">Tanggal Deadline</label>
                <input type="date" name="tanggal_deadline" id="tanggal_deadline" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="siswa_id" class="form-label">Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-control" required>
                    <option value="">Pilih Siswa</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success text-white">SIMPAN</button>
                <a href="{{ route('admin.tugas.index') }}" class="btn btn-warning ms-3">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
