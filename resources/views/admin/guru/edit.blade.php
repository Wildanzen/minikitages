@extends('layouts.app_modern')

@section('content')
<style>
        .bg-grey {
            background-color: #ededed;
            /* Warna ungu */
            color: white;
            /* Warna teks putih */
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
        <h5 class="card-header bg-grey text-black">edit guru</h5>
        <div class="card-body">

            <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-1 mb-3">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru"
                        name="nama_guru" name="nama" value="{{ old('nama_guru') ?? $guru->nama_guru }}">
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
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-warning ms-3">Kembali</a>
                </div>
            </form>
        </div>
    @endsection
