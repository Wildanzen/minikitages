<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLearning - E-Learning Platform</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-sans bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav
        class="bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-700 p-6 flex justify-between items-center transition-all duration-300 shadow-lg">
        <div class="text-white text-3xl font-bold tracking-widest">
            MyLearning
        </div>
        <ul class="flex space-x-6 text-white font-semibold">
            <li><a href="#home" class="hover:underline">Home</a></li>
            <li><a href="#testimonials" class="hover:underline">Testimonials</a></li>
            <li><a href="#statistics" class="hover:underline">Statistics</a></li>
            <li><a href="#contact" class="hover:underline">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative bg-cover bg-center text-center py-32 bg-fixed"
        style="background-image: url('https://via.placeholder.com/1920x800');" data-aos="fade-in">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative text-white z-10">
            <h1
                class="text-6xl font-extrabold mb-4 uppercase tracking-widest bg-gradient-to-r from-blue-400 via-pink-500 to-red-400 text-transparent bg-clip-text animate-pulse">
                Welcome to MyLearning</h1>
            <p class="text-lg mb-8">Unlock your full potential with the best learning platform</p>
            <a href="login"
                class="bg-blue-500 text-white py-3 px-10 rounded-full text-lg transition-all transform hover:scale-105 hover:shadow-xl hover:bg-blue-600 active:scale-95">LOGIN</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 text-center" data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-10 text-indigo-700">Discover Our Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <img src="https://via.placeholder.com/150" alt="feature image" class="mb-4 rounded-lg">
                <h3 class="text-2xl font-semibold mb-2">Online Courses</h3>
                <p class="text-gray-600">Access a wide variety of courses and enhance your skills from the comfort of
                    your home.</p>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <img src="https://via.placeholder.com/150" alt="feature image" class="mb-4 rounded-lg">
                <h3 class="text-2xl font-semibold mb-2">Expert Instructors</h3>
                <p class="text-gray-600">Learn from industry experts who will guide you throughout your learning
                    journey.</p>
            </div>
            <!-- Card 3 -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-100">
                <img src="https://via.placeholder.com/150" alt="feature image" class="mb-4 rounded-lg">
                <h3 class="text-2xl font-semibold mb-2">Interactive Quizzes</h3>
                <p class="text-gray-600">Test your knowledge with quizzes designed to reinforce your learning
                    experience.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="bg-gradient-to-b from-blue-100 via-white to-blue-50 py-16 text-center"
        data-aos="fade-up">
        <h2 class="text-4xl font-bold mb-10 text-blue-800">What Our Students Say</h2>
        <div class="flex justify-center gap-8 flex-wrap">
            <div
                class="bg-white p-6 w-80 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out">
                <p class="text-gray-600 mb-4">"This platform has transformed the way I learn. Highly recommended!"</p>
                <p class="font-semibold">- Alex</p>
            </div>
            <div
                class="bg-white p-6 w-80 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out">
                <p class="text-gray-600 mb-4">"The courses are well-structured and the instructors are amazing."</p>
                <p class="font-semibold">- Maria</p>
            </div>
            <div
                class="bg-white p-6 w-80 rounded-xl shadow-lg transform hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 ease-in-out">
                <p class="text-gray-600 mb-4">"I was able to improve my skills and land my dream job."</p>
                <p class="font-semibold">- John</p>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="bg-gradient-to-r from-green-50 to-white py-16 text-center" data-aos="fade-right">
        <h2 class="text-4xl font-bold mb-10 text-green-700">Our Achievements</h2>
        <div class="max-w-4xl mx-auto">
            <canvas id="statsChart"></canvas>
        </div>
        <p class="text-gray-600 mt-6 max-w-3xl mx-auto">With a growing community of learners, MyLearning has achieved
            remarkable milestones. Over 1,200 courses completed, 8,000 active users, and 150 professional instructors.
            These achievements reflect our commitment to empowering education and skill development worldwide.</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6">
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
                            label: function(tooltipItem) {
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
