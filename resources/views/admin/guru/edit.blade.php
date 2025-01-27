@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h5 class="card-header">Edit Guru</h5>
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-1 mb-3">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama_guru') ?? $guru->nama_guru }}">
                    <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                        required>
                        <option value="aktif" {{ $guru->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $guru->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur"
                        class="form-control @error('umur') is-invalid @enderror" value="{{ old('umur', $guru->umur) }}"
                        required min="0">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $guru->alamat) }}</textarea>
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>

                 <div class="text-ml mt-4">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    @endsection
