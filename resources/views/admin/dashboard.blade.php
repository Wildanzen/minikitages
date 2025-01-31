@extends('layouts.app_modern')

@section('content')
    <div class="container py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="text-xl font-semibold mb-4">Dashboard Guru</h5>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Total Guru</h6>
                            <p class="text-2xl">{{ $totalGuru }}</p>
                        </div>
                        <div class="bg-green-200 p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Guru Aktif</h6>
                            <p class="text-2xl">{{ $guruAktif }}</p>
                        </div>
                        <div class="bg-red-200 p-4 shadow rounded">
                            <h6 class="text-lg font-semibold">Guru Nonaktif</h6>
                            <p class="text-2xl">{{ $guruNonaktif }}</p>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="mt-6">
                        <h6 class="text-lg font-semibold">Guru yang Sering Online</h6>
                        <div id="guruChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include ApexCharts library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var guruData = {!! json_encode($guruSeringOnline->pluck('login_count')) !!};
        var guruNames = {!! json_encode($guruSeringOnline->pluck('nama_guru')) !!};

        var options = {
            chart: {
                type: 'bar',
                height: 400,
            },
            series: [{
                name: 'Jumlah Login',
                data: guruData
            }],
            xaxis: {
                categories: guruNames,
            }
        };

        var chart = new ApexCharts(document.querySelector("#guruChart"), options);
        chart.render();
    </script>
@endsection
