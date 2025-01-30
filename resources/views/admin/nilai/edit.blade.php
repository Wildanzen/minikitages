@extends('layouts.app_modern')

@section('content')
<div class="container mt-4">
    <h1>Edit Nilai</h1>
    <form action="{{ route('admin.nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="guru_id">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control">
                @foreach($guru as $g)
                    <option value="{{ $g->id }}" {{ old('guru_id', $nilai->guru_id) == $g->id ? 'selected' : '' }}>
                        {{ $g->nama }}
                    </option>
                @endforeach
            </select>
            @error('guru_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ old('siswa_id', $nilai->siswa_id) == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_siswa }}
                    </option>
                @endforeach
            </select>
            @error('siswa_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tugas_id">Tugas</label>
            <select name="tugas_id" id="tugas_id" class="form-control">
                @foreach($tugas as $t)
                    <option value="{{ $t->id }}" {{ old('tugas_id', $nilai->tugas_id) == $t->id ? 'selected' : '' }}>
                        {{ $t->judul }}
                    </option>
                @endforeach
            </select>
            @error('tugas_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100"
                value="{{ old('nilai', $nilai->nilai) }}">
            @error('nilai')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.nilai.index') }}" class="btn btn-warning ms-3">Kembali</a>
    </form>
</div>
@endsection
