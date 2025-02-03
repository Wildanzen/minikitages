@extends('layouts.app_modern')

@section('content')
<div class="container py-12">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 p-6 rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h5 class="text-xl font-semibold mb-4">Dashboard Guru</h5>

                <!-- Membuat layout dengan Flexbox untuk menempatkan card di samping grafik -->
                <div class="flex flex-wrap justify-between">
                    <!-- Card dengan informasi Total Guru, Guru Aktif, dan Guru Nonaktif -->
                    <div class="w-full sm:w-1/3 p-4">
                        <div class="bg-white p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Total Guru</h6>
                            <p class="text-2xl">{{ $totalGuru }}</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/3 p-4">
                        <div class="bg-green-200 p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Guru Aktif</h6>
                            <p class="text-2xl">{{ $guruAktif }}</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/3 p-4">
                        <div class="bg-red-200 p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Guru Nonaktif</h6>
                            <p class="text-2xl">{{ $guruNonaktif }}</p>
                        </div>
                    </div>

                    <!-- Grafik Guru Aktif vs Nonaktif per Bulan -->
                    <div class="w-full sm:w-2/3 mt-6 sm:mt-0 sm:ml-4">
                        <h6 class="text-lg font-semibold mb-4">Perbandingan Guru Aktif dan Nonaktif per Bulan</h6>
                        <div id="guruChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include ApexCharts library -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'bar',  // Mengubah tipe chart menjadi bar
            height: 400,
        },
        series: [{
            name: 'Guru Aktif',
            data: [{{ $guruAktifBulan1 }}, {{ $guruAktifBulan2 }}, {{ $guruAktifBulan3 }}],  // Data guru aktif per bulan
            color: '#10B981'  // Warna untuk guru aktif
        }, {
            name: 'Guru Nonaktif',
            data: [{{ $guruNonaktifBulan1 }}, {{ $guruNonaktifBulan2 }}, {{ $guruNonaktifBulan3 }}],  // Data guru nonaktif per bulan
            color: '#007BFF'  // Warna untuk guru nonaktif
        }],
        xaxis: {
            categories: ['Januari', 'Februari', 'Maret'],  // Kategori bulan
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,  // Grafik vertikal
                columnWidth: '20%',  // Membuat grafik lebih kurus
            }
        },
        dataLabels: {
            enabled: true,  // Menampilkan label data
        }
    };

    var chart = new ApexCharts(document.querySelector("#guruChart"), options);
    chart.render();
</script>
@endsection
