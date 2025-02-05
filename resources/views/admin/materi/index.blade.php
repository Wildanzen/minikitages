@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h6 class="card-header">Daftar Materi</h6>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <link rel="stylesheet" href="{{ asset('css/logoanimasi.css') }}">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMateriModal">
                    Tambah Materi
                </button>
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Materi...">
            </div>
            <table id="dataMateriTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-start">No</th>
                        <th>Judul Materi</th>
                        <th>Nama Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($materi as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->judul_materi }}</td>
                            <td>{{ $item->kelas->nama_kelas ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                    <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">-- Data belum tersedia --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Materi -->
    <div class="modal fade" id="tambahMateriModal" tabindex="-1" aria-labelledby="tambahMateriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahMateriModalLabel">Tambah Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.materi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_materi" class="form-label">Judul Materi</label>
                            <input type="text" name="judul_materi" id="judul_materi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea name="konten" id="konten" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-select" required>
                                @foreach($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var table = $('#dataMateriTable').DataTable({
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
