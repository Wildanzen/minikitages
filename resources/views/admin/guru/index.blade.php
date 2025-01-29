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

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
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
                        <th>Status</th>
                        <th>Umur</th>
                        <th>Alamat</th>
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
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->umur }}</td>
                                <td>{{ $item->alamat }}</td>
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
            setTimeout(function () {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.style.transition = "opacity 0.5s";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                });
            }, 3000);
        </script>
    @endpush
@endsection
