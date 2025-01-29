@extends('layouts.app_modern')

@section('content')

    <div class="container py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Title for the page -->
                    <h5 class="text-xl font-semibold mb-4">overview</h5>
                     <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
                    <!-- Chart Container -->
                    <div id="chart" class="w-full"></div>
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
                width: '100%', // Menjadikan chart lebar 100% dari kontainer
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%', // Mengurangi lebar batang untuk membuatnya lebih ramping
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
                text: 'kontol',
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
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 350, // Menyesuaikan tinggi chart saat layar lebih kecil
                    },
                    title: {
                        style: {
                            fontSize: '12px', // Mengurangi ukuran font judul saat layar lebih kecil
                        }
                    }
                }
            }]
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

@endsection
