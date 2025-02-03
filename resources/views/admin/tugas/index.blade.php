@extends('layouts.app_modern')

@section('content')
<div class="card">
    <h6 class="card-header bg-grey text-black">Daftar Tugas</h6>
    <div class="card-body">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.tugas.create') }}" class="btn btn-primary">Tambah Data</a>
            <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Tugas...">
        </div>

        <table id="dataTugasTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Tugas</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Siswa</th> <!-- Ubah jika relasi ke siswa -->
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($tugas->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">-- Data tugas belum tersedia --</td>
                    </tr>
                @else
                    @foreach ($tugas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul_tugas }}</td>
                            <td>{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_deadline)->format('d M Y') }}</td>
                            <td>{{ $item->siswa->nama_siswa }}</td> <!-- Relasi ke siswa -->
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('admin.tugas.show', $item->id) }}"
                                        class="btn btn-secondary btn-sm me-2">Lihat</a>
                                    <a href="{{ route('admin.tugas.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm me-2">Edit</a>
                                    <form action="{{ route('admin.tugas.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin ingin menghapus tugas ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            var table = $('#dataTugasTable').DataTable({
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

            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
@endpush

@endsection
