@extends('layouts.app_modern')

@section('content')
    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Title for the page -->
                    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>

                    <!-- Chart Container -->
                    <div>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipe chart (bisa line, bar, dll)
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Biru muda untuk area di bawah batang
                borderColor: 'rgba(54, 162, 235, 1)', // Biru untuk warna tepi batang
                borderWidth: 1, // Lebar garis border
                barThickness: 15, // Ketebalan batang chart (kuruskan dengan angka lebih kecil)
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
