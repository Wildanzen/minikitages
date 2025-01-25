<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLearning - E-Learning Platform</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- AOS CSS (Animate on Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-sans bg-white text-gray-800">


    <!-- Navbar -->
    <nav
        class="bg-gradient-to-r from-blue-600 via-indigo-500 to-purple-600 p-6 flex justify-between items-center transition-all duration-300">
        <div class="text-white text-2xl font-bold">
            MyLearning
        </div>
        <ul class="flex space-x-6 text-white">
            <li>
                <a href="#home" class="relative group">
                    Home
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-white transition-all group-hover:w-full transform group-active:scale-110"></span>
                </a>
            </li>
            <li>
                <a href="#testimonials" class="relative group">
                    Testimonials
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-white transition-all group-hover:w-full transform group-active:scale-110"></span>
                </a>
            </li>
            <li>
                <a href="#statistics" class="relative group">
                    Statistics
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-white transition-all group-hover:w-full transform group-active:scale-110"></span>
                </a>
            </li>
            <li>
                <a href="#contact" class="relative group">
                    Contact
                    <span
                        class="absolute left-0 bottom-0 w-0 h-1 bg-white transition-all group-hover:w-full transform group-active:scale-110"></span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-cover bg-center text-center py-32 bg-fixed"
        style="background-image: url('https://via.placeholder.com/1920x800');" data-aos="fade-in">
        <div class="text-white">
            <h1
                class="text-5xl font-bold mb-4 uppercase tracking-widest bg-gradient-to-r from-blue-600 via-pink-500 to-red-400 text-transparent bg-clip-text transform transition-all duration-300 ease-in-out hover:scale-110">
                Welcome to MyLearning
            </h1>
            <p class="text-black mb-8">Unlock your full potential with the best learning platform</p>
            <a href="login"
                class="bg-blue-500 text-white py-3 px-8 rounded-full text-xl transition-all transform hover:scale-105 hover:shadow-xl hover:bg-blue-600 active:scale-95 active:shadow-inner">
                LOGIN
            </a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="bg-blue-50 py-16 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-semibold mb-8 text-blue-800">What Our Students Say</h2>
        <div class="flex justify-center gap-10 flex-wrap">
            <div
                class="bg-white p-6 w-80 rounded-lg shadow-lg transform hover:translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <p class="text-gray-600 mb-4">"This platform has transformed the way I learn. Highly recommended!"</p>
                <p>- Alex</p>
            </div>
            <div
                class="bg-white p-6 w-80 rounded-lg shadow-lg transform hover:translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <p class="text-gray-600 mb-4">"The courses are well-structured and the instructors are amazing."</p>
                <p>- Maria</p>
            </div>
            <div
                class="bg-white p-6 w-80 rounded-lg shadow-lg transform hover:translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <p class="text-gray-600 mb-4">"I was able to improve my skills and land my dream job."</p>
                <p>- John</p>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="bg-green-50 py-16 text-center" data-aos="fade-right">
        <h2 class="text-3xl font-semibold mb-8 text-green-700">Our Achievements</h2>
        <div class="max-w-4xl mx-auto transform hover:shadow-2xl transition-all duration-300 ease-in-out">
            <canvas id="statsChart"></canvas>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-16">
        <p>&copy; 2025 MyLearning. All Rights Reserved.</p>
    </footer>

    <!-- AOS JS (Animate on Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Chart.js Configuration
        const ctx = document.getElementById('statsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Courses Completed', 'Active Users', 'Instructors'],
                datasets: [{
                    label: 'Statistics',
                    data: [1200, 8000, 150],
                    backgroundColor: ['#4caf50', '#2196f3', '#ff9800'],
                    borderColor: ['#388e3c', '#1976d2', '#f57c00'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return tooltipItem.label + ": " + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
