@extends('layouts.app_modern')

@section('content')
<div class="container mt-4">
    <h1>Tambah Nilai</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.nilai.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="guru_id">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ old('guru_id') == $g->id ? 'selected' : '' }}>{{ $g->nama_guru }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>{{ $s->nama_siswa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tugas_id">Tugas</label>
            <select name="tugas_id" id="tugas_id" class="form-control">
                @foreach($tugas as $t)
                    <option value="{{ $t->id }}" {{ old('tugas_id') == $t->id ? 'selected' : '' }}>{{ $t->judul_tugas }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100"
                value="{{ old('nilai') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.nilai.index') }}" class="btn btn-warning ms-3">Kembali</a>
    </form>
</div>
@endsection
