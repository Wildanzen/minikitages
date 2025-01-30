@extends('layouts.app_modern')
@section('content')
<style>
        .bg-grey {
            background-color: #ffffff;
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
       <h4 class="card-header bg-grey text-black">Daftar Tugas</h4>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('tugas.create') }}" class="btn btn-primary">Tambah Data</a>
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Tugas...">
            </div>
            <table id="dataGuruTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Tugas</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($tugas->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; padding-right: 120px;">--Data tugas ini belum
                                tersedia--</td>
                        </tr>
                    @else
                        @foreach ($tugas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_tugas }}</td>
                                <td>{{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_deadline)->format('d M Y') }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td> <!-- Relasi ke tabel kelas -->
                                <td>
                                <td class="text-center">
                                     <div class="d-flex justify-content-center">
                                        <a href="{{ route('tugas.show', $item->id) }}"
                                            class="btn btn-secondary btn-sm me-2">Lihat</a>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('tugas.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('tugas.destroy', $item->id) }}" method="POST"
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

                // Custom Search di Luar Tabel
                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
    @endpush
@endsection
