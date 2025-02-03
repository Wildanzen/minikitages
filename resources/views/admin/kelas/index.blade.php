@extends('layouts.app_modern')
@section('content')
    <div class="card">
        <h6 class="card-header">Daftar Kelas</h6>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKelasModal">Tambah Data</button>
                <div class="search-container position-relative w-50">
                    <i class="fas fa-search position-absolute"></i>
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Data Guru...">
                </div>
            </div>
            <table id="dataKelasTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-start">No</th>
                        <th>Nama Kelas</th>
                        <th>Guru</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $item)
                        <tr>
                            <td class="text-start">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->guru->nama_guru }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <!-- Tombol Show (Detail) -->
                                    <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#kelasModal{{ $item->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <div class="d-flex justify-content-center">
                                        <!-- Edit button triggers modal -->
                                        <button type="button" class="btn btn-warning btn-sm me-2"
                                            onclick="openEditModal('{{ $item->id }}', '{{ $item->nama_kelas }}', '{{ $item->guru->id }}')">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <!-- Delete button with trash bin icon -->
                                        <form action="{{ route('admin.guru.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin ?')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">--Data kelas belum tersedia--</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="tambahKelasModal" tabindex="-1" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-grey">
                    <h5 class="modal-title text-black" id="tambahKelasModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                value="{{ old('nama_kelas') }}">
                        </div>
                        <div class="mb-3">
                            <label for="guru_id" class="form-label">Guru</label>
                            <select class="form-control" id="guru_id" name="guru_id">
                                <option value="">Pilih Guru</option>
                                @foreach ($guru as $g)
                                    <option value="{{ $g->id }}" {{ old('guru_id') == $g->id ? 'selected' : '' }}>
                                        {{ $g->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    <div class="modal fade" id="editKelasModal" tabindex="-1" aria-labelledby="editKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editKelasForm" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="edit_nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="edit_nama_kelas" name="nama_kelas" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_guru_id" class="form-label">Guru</label>
                            <select class="form-control" id="edit_guru_id" name="guru_id" required>
                                <option value="">Pilih Guru</option>
                                @foreach ($guru as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Detail Kelas -->
    <div class="modal fade" id="kelasModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="kelasModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelasModalLabel{{ $item->id }}">Detail Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Kelas:</strong> {{ $item->nama_kelas }}</p>
                    <p><strong>Guru:</strong> {{ $item->guru->nama_guru }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->

    @section('scripts')
        <script>
            function openEditModal(id, nama_kelas, guru_id) {
                // Mengisi form modal dengan data yang dipilih
                $('#edit_nama_kelas').val(nama_kelas);
                $('#edit_guru_id').val(guru_id);

                // Mengubah action form sesuai dengan ID kelas yang dipilih
                let formAction = "{{ url('admin/kelas') }}/" + id;
                $('#editKelasForm').attr('action', formAction);

                // Menampilkan modal
                var myModal = new bootstrap.Modal(document.getElementById('editKelasModal'));
                myModal.show();
            }

            @if ($errors->any())
                $(document).ready(function() {
                    var myModal = new bootstrap.Modal(document.getElementById('tambahKelasModal'));
                    myModal.show();
                });
            @endif
        </script>
    @endsection
@endsection
