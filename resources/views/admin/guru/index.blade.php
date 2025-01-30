@extends('layouts.app_modern')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                let alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease-in-out";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                }
            }, 4000);
        </script>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                let alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease-in-out";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                }
            }, 4000);
        </script>
    @endif

    <style>
        .bg-grey {
            background-color: #ffffff;
            color: white;
        }

        /* Menebalkan seluruh teks dalam card */
        .card, .card-header, .card-body, th, td, .form-control, .btn {
            font-weight: bold;
        }

        /* Menebalkan teks pada input search */
        #searchInput {
            font-weight: bold;
        }

        /* Menyesuaikan badge active dengan desain yang lebih elegan */
        .badge-active {
            background-color: #5fd27a;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-transform: capitalize;
            transition: all 0.3s ease;
        }

        /* Menyesuaikan badge inactive dengan desain yang lebih elegan */
        .badge-inactive {
            background-color: #de4e4e;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-transform: capitalize;
            transition: all 0.3s ease;
        }

        /* Menambahkan efek hover untuk interaksi */
        .badge-active:hover, .badge-inactive:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
    </style>

    <div class="card">
        <h4 class="card-header bg-grey text-black">Daftar Guru</h4>
        <div class="card-body">
            <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <!-- Button to trigger modal for adding data -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuruModal">
                    Tambah Data
                </button>
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Guru...">
            </div>

            <table id="dataGuruTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th class="status-column">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guru as $item)
                        <tr>
                            <td class="text-start">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>
                                <span class="status-column {{ strtolower(trim($item->status)) === 'aktif' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Edit button triggers modal -->
                                    <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editGuruModal{{ $item->id }}">
                                        Edit
                                    </button>

                                    <!-- Delete button -->
                                    <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal for each guru -->
                        <div class="modal fade" id="editGuruModal{{ $item->id }}" tabindex="-1" aria-labelledby="editGuruModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editGuruModalLabel{{ $item->id }}">Edit Guru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('guru.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <!-- Nama Guru -->
                                            <div class="form-group mb-3">
                                                <label for="nama_guru" class="d-block">Nama Guru</label>
                                                <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                                       id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $item->nama_guru) }}">
                                                <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                                            </div>

                                            <!-- Status -->
                                            <div class="form-group mb-3">
                                                <label for="status" class="d-block">Status</label>
                                                <select name="status" id="status" class="form-control w-100">
                                                    <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="nonaktif" {{ $item->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                                </select>
                                            </div>

                                            <!-- Umur -->
                                            <div class="form-group mb-3">
                                                <label for="umur" class="d-block">Umur</label>
                                                <input type="number" class="form-control @error('umur') is-invalid @enderror"
                                                       id="umur" name="umur" value="{{ old('umur', $item->umur) }}">
                                                <span class="text-danger">{{ $errors->first('umur') }}</span>
                                            </div>

                                            <!-- Alamat -->
                                            <div class="form-group mb-3">
                                                <label for="alamat" class="d-block">Alamat</label>
                                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                                       id="alamat" name="alamat" value="{{ old('alamat', $item->alamat) }}">
                                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                            </div>

                                            <!-- Submit and close buttons -->
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-success">SIMPAN</button>
                                                <button type="button" class="btn btn-secondary ms-3" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">-- Data guru ini belum tersedia --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Add Data -->
    <div class="modal fade" id="tambahGuruModal" tabindex="-1" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahGuruModalLabel">Tambah Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.guru.store') }}" method="POST">
                        @csrf
                        <!-- Nama Guru -->
                        <div class="form-group mb-3">
                            <label for="nama_guru" class="d-block">Nama Guru</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                id="nama_guru" name="nama_guru" value="{{ old('nama_guru') }}">
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
                            <button type="button" class="btn btn-secondary ms-3" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var table = $('#dataGuruTable').DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        zeroRecords: "Tidak ada data ditemukan",
                        info: "Menampilkan _PAGE_ dari _PAGES_ halaman",
                        infoEmpty: "Tidak ada data tersedia",
                        infoFiltered: "(difilter dari _MAX_ total data)"
                    }
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush

@endsection
