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

    <div class="card">
        <h6 class="card-header">Daftar Kelas</h6>
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
                <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Data</a>
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari Data Kelas...">
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
                    @if ($kelas->isEmpty())
                        <tr>
                            <td colspan="4" style="text-align: center; padding-right: 120px;">--Data kelas belum
                                tersedia--</td>
                        </tr>
                    @else
                        @foreach ($kelas as $item)
                            <tr>
                                <td class="text-start">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kelas }}</td>
                                <td>{{ $item->guru->nama_guru }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('kelas.show', $item->id) }}"
                                            class="btn btn-secondary btn-sm me-2">Lihat</a>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('kelas.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm me-2">Edit</a>
                                            <form action="{{ route('kelas.destroy', $item->id) }}" method="POST"
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
                var table = $('#dataKelasTable').DataTable({
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
