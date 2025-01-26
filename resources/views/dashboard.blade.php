@extends('layouts.app_modern')

@section('content')
    <style>
        body {
            background-color: #e0e0e0; /* Latar belakang halaman */
        }

        #chart {
            background-color: #ffffff; /* Latar belakang grafik */
            padding: 20px; /* Padding untuk grafik */
            border-radius: 40px; /* Sudut melengkung yang lebih tumpul */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan untuk efek kedalaman */
            width: 100%; /* Lebar default 100% */
            max-width: 770px; /* Lebar maksimum */
            margin-left: -20px;  /* Menambahkan margin kiri untuk menggeser ke kiri */
            margin-top: -10x;
        }

        /* Optional: Adjust container spacing */
        .container {
            padding-top: 0; /* Menghapus padding atas */
        }
    </style>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Title for the page -->
                    <h5 class="text-xl font-semibold mb-4">overview</h5>

                    <!-- Chart Container -->
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include ApexCharts library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 400,
                width: 750,
                toolbar: {
                    show: false
                },
                // background: '#ffffff' // Mengubah latar belakang menjadi putih
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%', // Mengurangi lebar batang untuk membuatnya lebih ramping
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true,
            },
            colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'],
            series: [{
                name: 'My First Dataset',
                data: [65, 59, 80, 81, 56]
            }],
            xaxis: {
                categories: ['January', 'February', 'March', 'April', 'May'],
            },
            yaxis: {
                title: {
                    // text: 'Values'
                }
            },
            title: {
                text: 'Monthly Data', // Mengaktifkan judul grafik
                align: 'center',
                style: {
                    fontSize: '15px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                shared: true,
                intersect: false
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

@endsection
