@extends('layouts.app_modern')

@section('content')
    <div class="card">
        <h5 class="card-header">Daftar Materi</h5>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('materi.create') }}" class="btn btn-primary">Tambah Materi</a>
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Materi...">
            </div>
            <table id="dataKelasTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-start">No</th>
                        <th>Judul Materi</th>
                        <th>Nama Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($materi->isEmpty())
                        <tr>
                            <td colspan="4" style="text-align: center; padding-right: 120px;">--Data  belum tersedia--</td>
                        </tr>
                    @else
                        @foreach ($materi as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_materi }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.materi.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ?')">
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
            $(document).ready(function() {
                // Inisialisasi DataTable
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

                // Custom Search di luar tabel
                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
@endsection
