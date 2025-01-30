@extends('layouts.app_modern')
@section('content')
    </style>
    <div class="card">
        <h6 class="card-header">Daftar Nilai</h6>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                <link rel="stylesheet" href="{{ asset('css/logoanimasi.css') }}">
                <a href="{{ route('nilai.create') }}" class="btn btn-primary">Tambah Data</a>
=======
                <a href="{{ route('admin.nilai.create') }}" class="btn btn-primary">Tambah Data</a>
>>>>>>> 6a1564da533044259de139729b916cdae3c7812f
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Nilai...">
            </div>
            <table id="dataGuruTable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Siswa</th>
                        <th>Tugas</th>
                        <th>Nilai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($nilai->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; padding-right: 120px;">--Data Nilai ini belum
                                tersedia--</td>
                        </tr>
                    @else
                        @foreach ($nilai as $n)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $n->guru->nama }}</td>
                                <td>{{ $n->siswa->nama_siswa }}</td>
                                <td>{{ $n->tugas->judul }}</td>
                                <td>{{ $n->nilai }}</td>
                                <td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.nilai.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('admin.nilai.destroy', $item->id) }}" method="POST"
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
                var table = $('#dataNilaiTable').DataTable({
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
