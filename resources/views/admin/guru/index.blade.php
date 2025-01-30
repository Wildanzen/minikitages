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

    <div class="card">
        <h6 class="card-header">Daftar Guru</h6>
        <div class="card-body">
            <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
                <!-- Button to trigger modal for adding data -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuruModal">
                    Tambah Data
                </button>
                <div class="search-container position-relative w-50">
                    <input type="text" id="searchInput" class="form-control pl-5" placeholder="Cari Data Guru...">
                    <i class="fas fa-search position-absolute"
                        style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
                </div>
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
                                <span
                                    class="status-column {{ strtolower(trim($item->status)) === 'aktif' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Edit button triggers modal -->
                                    <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                        data-bs-target="#editGuruModal{{ $item->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Delete button with trash bin icon -->
                                    <form action="{{ route('admin.guru.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link text-danger"
                                            onclick="return confirm('Anda yakin ?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <!-- Edit Modal for each guru -->
                            <div class="modal fade" id="editGuruModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="editGuruModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editGuruModalLabel{{ $item->id }}">Edit Guru
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.guru.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <!-- Nama Guru -->
                                                <div class="form-group mb-3">
                                                    <label for="nama_guru" class="d-block">Nama Guru</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_guru') is-invalid @enderror"
                                                        id="nama_guru" name="nama_guru"
                                                        value="{{ old('nama_guru', $item->nama_guru) }}">
                                                    <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                                                </div>

                                                <!-- Status -->
                                                <div class="form-group mb-3">
                                                    <label for="status" class="d-block">Status</label>
                                                    <select name="status" id="status" class="form-control w-100">
                                                        <option value="aktif"
                                                            {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="nonaktif"
                                                            {{ $item->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                                                        </option>
                                                    </select>
                                                </div>

                                                <!-- Umur -->
                                                <div class="form-group mb-3">
                                                    <label for="umur" class="d-block">Umur</label>
                                                    <input type="number"
                                                        class="form-control @error('umur') is-invalid @enderror"
                                                        id="umur" name="umur"
                                                        value="{{ old('umur', $item->umur) }}">
                                                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                                                </div>

                                                <!-- Alamat -->
                                                <div class="form-group mb-3">
                                                    <label for="alamat" class="d-block">Alamat</label>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat"
                                                        value="{{ old('alamat', $item->alamat) }}">
                                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                                </div>

                                                <!-- Submit and close buttons -->
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-success">SIMPAN</button>
                                                    <button type="button" class="btn btn-secondary ms-3"
                                                        data-bs-dismiss="modal">Tutup</button>
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
    <div class="modal fade" id="tambahGuruModal" tabindex="-1" aria-labelledby="tambahGuruModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                id="alamat" name="alamat" value="{{ old('alamat') }}">
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


    @section('scripts')
        <script>
            @if ($errors->any())
                $(document).ready(function() {
                    var myModal = new bootstrap.Modal(document.getElementById('tambahGuruModal'));
                    myModal.show();
                });
            @endif

            // $(document).ready(function() {
            //     var table = $('#dataGuruTable').DataTable({
            //         responsive: true,
            //         autoWidth: false,
            //         language: {
            //             search: "Cari:",
            //             lengthMenu: "Tampilkan _MENU_ data per halaman",
            //             zeroRecords: "Tidak ada data ditemukan",
            //             info: "Menampilkan _PAGE_ dari _PAGES_ halaman",
            //             infoEmpty: "Tidak ada data tersedia",
            //             infoFiltered: "(difilter dari _MAX_ total data)"
            //         }
            //     });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            // });
        </script>
    @endsection
@endsection
