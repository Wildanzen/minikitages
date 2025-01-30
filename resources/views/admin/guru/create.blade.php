@extends('layouts.app_modern')

@section('content')
    <style>
        .bg-grey {
            background-color: #ededed;
            color: white;
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

    </style>
    <div class="card">
        <h5 class="card-header bg-grey text-black">Tambah guru</h5>
        <div class="card-body">
            <form action="{{ route('admin.guru.store') }}" method="POST">
                @csrf
                <!-- Nama Guru -->
                <div class="form-group mb-3">
                    <label for="nama_guru" class="d-block">Nama Guru</label>
                    <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru"
                        name="nama_guru" value="{{ old('nama_guru') }}">
                    <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                </div>
                <!-- Status -->
                <div class="form-group mb-3">
                    <label for="status" class="d-block">Status</label>
                    <select name="status" id="status" class="form-control w-100">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <!-- Umur -->
                <div class="form-group mb-3">
                    <label for="umur" class="d-block">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur') }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>

                <!-- Alamat -->
                <div class="form-group mb-3">
                    <label for="alamat" class="d-block">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <!-- Tombol Aksi -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-warning ms-3">Kembali</a>
                </div>
            </form>
            </form>
        </div>
        <script>
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.style.transition = "opacity 0.5s";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                });
            }, 3000);
        </script>
    </div>
    </div>
@endsection
