<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLearning - E-Learning Platform</title>

    <!-- Google Font & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- AOS CSS (Animate on Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Reset and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #119ad5;
            color:  #444;
        }

        h1,
        h2,
        h3 {
            color: #2c3e50;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        .navbar {
            background-color: #3856de;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo h2 {
            color: rgb(0, 0, 0);
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: white;
            font-weight: bold;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #fbc02d;
        }

        /* Hero Section */
        .hero {
            background: url('https://via.placeholder.com/1920x800') center center no-repeat;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .hero .hero-content h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .hero .hero-content p {
            font-size: 1.8em;
            margin-bottom: 40px;
        }

        .hero .btn {
            background-color: #2196f3;
            color: white;
            padding: 12px 40px;
            font-size: 1.3em;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .hero .btn:hover {
            background-color: #1976d2;
            transform: translateY(-5px);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 70px 20px;
            text-align: center;
            background-color: #e3f2fd;
        }

        .testimonials h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #0288d1;
        }

        .testimonials .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .testimonials .card {
            background-color: white;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .testimonials .card:hover {
            transform: translateY(-10px);
        }

        .testimonials .card p {
            font-size: 1em;
            color: #555;
        }

        /* Statistics Section */
        .statistics {
            padding: 70px 20px;
            background-color: #f1f8e9;
            text-align: center;
        }

        .statistics h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #388e3c;
        }

        .chart-container {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Footer */
        footer {
            background-color: #424242;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <h2>MyLearning</h2>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#statistics">Statistics</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero" data-aos="fade-in">
        <div class="hero-content">
            <h1>Welcome to MyLearning</h1>
            <p>Empowering your future through education</p>
            <a href="login" class="btn">LOGIN</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials" data-aos="fade-up">
        <h2>What Our Students Say</h2>
        <div class="cards">
            <div class="card">
                <p>"This platform has transformed the way I learn. Highly recommended!"</p>
                <p>- Alex</p>
            </div>
            <div class="card">
                <p>"The courses are well-structured and the instructors are amazing."</p>
                <p>- Maria</p>
            </div>
            <div class="card">
                <p>"I was able to improve my skills and land my dream job."</p>
                <p>- John</p>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="statistics" data-aos="fade-right">
        <h2>Our Achievements</h2>
        <div class="chart-container">
            <canvas id="statsChart"></canvas>
        </div>
    </section>

    <!-- Footer -->
    <footer>
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
                    }
                }
            }
        });
    </script>
</body>

</html>
