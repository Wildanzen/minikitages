@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h6 class="card-header">Daftar Siswa</h6>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
                <!-- Trigger Modal Button for Add -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal">
                    Tambah Data
                </button>
                <!-- Search Input -->
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Siswa...">
            </div>
            <table id="dataSiswaTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-start">No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($siswa->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; padding-right: 120px;">--Data siswa ini belum
                                tersedia--</td>
                        </tr>
                    @else
                        @foreach ($siswa as $item)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <!-- Trigger Modal Button for Edit -->
                                        <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                                            data-bs-target="#editSiswaModal{{ $item->id }}">
                                            Edit
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.siswa.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin ?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for Editing Student -->
                            <div class="modal fade" id="editSiswaModal{{ $item->id }}" tabindex="-1" aria-labelledby="editSiswaModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-grey text-black">
                                            <h5 class="modal-title" id="editSiswaModalLabel{{ $item->id }}">Edit Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.siswa.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <!-- Nama Siswa -->
                                                <div class="form-group mt-3">
                                                    <label for="nama_siswa">Nama Siswa</label>
                                                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ old('nama_siswa', $item->nama_siswa) }}">
                                                    @error('nama_siswa')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Umur -->
                                                <div class="form-group mt-3">
                                                    <label for="umur">Umur</label>
                                                    <input type="number" name="umur" id="umur" class="form-control" value="{{ old('umur', $item->umur) }}">
                                                    @error('umur')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Kelas -->
                                                <div class="form-group mt-3">
                                                    <label for="kelas_id">Kelas</label>
                                                    <select name="kelas_id" id="kelas_id" class="form-control" required>
                                                        @foreach ($kelas as $k)
                                                            <option value="{{ $k->id }}" {{ old('kelas_id', $item->kelas_id) == $k->id ? 'selected' : '' }}>
                                                                {{ $k->nama_kelas }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('kelas_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Alamat -->
                                                <div class="form-group mt-3">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
                                                    @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Perbarui</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding Student -->
    <div class="modal fade" id="tambahSiswaModal" tabindex="-1" aria-labelledby="addSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-grey text-black">
                    <h5 class="modal-title" id="addSiswaModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.siswa.store') }}" method="POST">
                        @csrf
                        <!-- Nama Siswa -->
                        <div class="form-group mt-3">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Umur -->
                        <div class="form-group mt-3">
                            <label for="umur">Umur</label>
                            <input type="number" name="umur" id="umur" class="form-control" value="{{ old('umur') }}">
                            @error('umur')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="form-group mt-3">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
       @section('scripts')
        <script>
            @if ($errors->any())
                $(document).ready(function() {
                    var myModal = new bootstrap.Modal(document.getElementById('tambahSiswaModal'));
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
