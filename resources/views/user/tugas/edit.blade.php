@extends('layouts.app_modern')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Tugas</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.tugas.index') }}" class="btn btn-secondary mb-3">Kembali</a>

            <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="judul_tugas">Judul Tugas</label>
                    <input type="text" name="judul_tugas" id="judul_tugas" class="form-control" value="{{ old('judul_tugas', $tugas->judul_tugas) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_deadline">Deadline</label>
                    <input type="date" name="tanggal_deadline" id="tanggal_deadline" class="form-control" value="{{ old('tanggal_deadline', $tugas->tanggal_deadline) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control" required>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" {{ $item->id == old('kelas_id', $tugas->kelas_id) ? 'selected' : '' }}>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.tugas.index') }}" class="btn btn-warning ms-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
