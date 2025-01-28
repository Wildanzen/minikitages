@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Guru</h5>
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Nama Guru -->
                    <div class="col-md-6 form-group mb-3">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru"
                            name="nama_guru" value="{{ old('nama_guru') }}">
                        <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                    </div>
                    <!-- Status -->
                    <div class="col-md-6 mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="form-control mt-1">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Umur -->
                    <div class="col-md-6 form-group mb-3">
                        <label for="umur">Umur</label>
                        <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                               name="umur" value="{{ old('umur') }}">
                        <span class="text-danger">{{ $errors->first('umur') }}</span>
                    </div>
                    <!-- Alamat -->
                    <div class="col-md-6 form-group mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                               name="alamat" value="{{ old('alamat') }}">
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                </div>

                <div class="text-ml mt-4">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
