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
        <h5 class="card-header bg-grey text-black">Tambah siswa</h5>
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <!-- Nama  -->
                <div class="form-group mt-3">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
                        value="{{ old('nama_siswa') }}">
                    @error('nama_siswa')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!--  -->
                <div class="form-group mt-3">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas') }}">
                    @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ur -->
                <div class="form-group mt-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- STATUS -->
                <div class="form-group mt-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Garis di Atas Tombol -->
                {{-- <hr style="border: 1px solid #00b7ff; margin-top: 20px; margin-bottom: 20px;"> --}}

                <!-- Tombol Simpan di Kanan Bawah -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-warning ms-3">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
