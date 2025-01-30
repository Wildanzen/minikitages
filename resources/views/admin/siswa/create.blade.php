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
            <form action="{{ route('admin.siswa.store') }}" method="POST">
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

                <div class="form-group mt-3">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur" class="form-control" value="{{ old('umur') }}" required>
                    @error('umur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!--  -->
                <div class="form-group mt-3">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('kelas_id')
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

                <!-- Garis di Atas Tombol -->
                {{-- <hr style="border: 1px solid #00b7ff; margin-top: 20px; margin-bottom: 20px;"> --}}

                <!-- Tombol Simpan di Kanan Bawah -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-warning ms-3">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
