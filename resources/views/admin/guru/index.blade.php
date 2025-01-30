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

        /* Menyesuaikan badge active dengan desain yang lebih elegan */
        .badge-active {
            background-color: #5fd27a;
            /* Hijau */
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-transform: capitalize;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
            transition: all 0.3s ease;
        }

        /* Menyesuaikan badge inactive dengan desain yang lebih elegan */
        .badge-inactive {
            background-color: #de4e4e;
            /* Merah */
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            text-transform: capitalize;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
            transition: all 0.3s ease;
        }

        /* Menambahkan efek hover untuk interaksi */
        .badge-active:hover,
        .badge-inactive:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }
    </style>

    @if(session('success'))
    <div id="alertSuccess" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div id="alertError" class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="card">
        <h4 class="card-header bg-grey text-black">Daftar Guru</h4>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Data</a>
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
                    @if ($guru->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; padding-right: 120px;">--Data guru ini belum
                                tersedia--</td>
                        </tr>
                    @else
                        @foreach ($guru as $item)
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
                                        <a href="{{ route('guru.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST"
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

                // Custom Search di Luar Tabel
                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Cek apakah elemen notifikasi ada
                if ($("#alertSuccess").length) {
                    console.log("Alert Success ditemukan");
                    setTimeout(function() {
                        $("#alertSuccess").fadeOut('slow');
                    }, 3000); // Hilangkan setelah 3 detik
                }

                if ($("#alertError").length) {
                    console.log("Alert Error ditemukan");
                    setTimeout(function() {
                        $("#alertError").fadeOut('slow');
                    }, 3000); // Hilangkan setelah 3 detik
                }
            });
        </script>
    @endpush
@endsection
