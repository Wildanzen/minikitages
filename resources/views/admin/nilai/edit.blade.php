@extends('layouts.app_modern')

@section('content')
<div class="container mt-4">
    <h1>Edit Nilai</h1>
    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="guru_id">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ $nilai->guru_id == $g->id ? 'selected' : '' }}>{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama_siswa }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tugas_id">Tugas</label>
            <select name="tugas_id" id="tugas_id" class="form-control">
                @foreach($tugas as $t)
                    <option value="{{ $t->id }}" {{ $nilai->tugas_id == $t->id ? 'selected' : '' }}>{{ $t->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100"
                value="{{ $nilai->nilai }}">
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
         <a href="{{ route('nilai.index') }}" class="btn btn-warning ms-3">Kembali</a>
    </form>
</div>
@endsection
