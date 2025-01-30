@extends('layouts.app_modern')

@section('content')
<div class="container">
    <h1>Edit Siswa</h1>

    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
                value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
            @error('nama_siswa')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" class="form-control" value="{{ old('umur', $siswa->umur) }}" required>
            @error('umur')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <<div class="form-group mt-3">
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control" required>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $siswa->alamat) }}</textarea>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-4">Perbarui</button>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-warning mt-4">Kembali</a>
    </form>
</div>
@endsection
