<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <!-- Google Font & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- AOS CSS (Animate on Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Reset and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f1f5f8;
            color: #444;
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
            background-color: #3498db;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo h2 {
            color: white;
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
            color: #e74c3c;
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
            background-color: #1abc9c;
            color: white;
            padding: 12px 40px;
            font-size: 1.3em;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .hero .btn:hover {
            background-color: #16a085;
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }

        /* Services Section */
        .services {
            padding: 70px 20px;
            background-color: #ecf0f1;
            text-align: center;
        }

        .services h2 {
            margin-bottom: 30px;
            font-size: 2.5em;
            color: #2980b9;
        }

        .service-cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .service-cards .card {
            background-color: #fff;
            padding: 25px;
            width: 250px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .service-cards .card:hover {
            transform: translateY(-10px);
        }

        .service-cards .card i {
            font-size: 3em;
            color: #3498db;
        }

        .service-cards .card h3 {
            margin-top: 15px;
            font-size: 1.6em;
        }

        /* About Section */
        .about {
            padding: 70px 20px;
            text-align: center;
            background-color: #fff;
        }

        .about h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #2980b9;
        }

        .about p {
            font-size: 1.2em;
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* Contact Section */
        .contact {
            padding: 70px 20px;
            background-color: #ecf0f1;
            text-align: center;
        }

        .contact h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #2980b9;
        }

        .contact form {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact input,
        .contact textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #3498db;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .contact button {
            padding: 15px 30px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.3em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact button:hover {
            background-color: #2980b9;
        }

        /* Footer */
        footer {
            background-color: #34495e;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <h2>MyLanding</h2>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero" data-aos="fade-in">
        <div class="hero-content">
            <h1>Welcome to MyLanding</h1>
            <p>Build your future with us</p>
            <a href="#services" class="btn">Explore Now</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services" data-aos="fade-up">
        <h2>Our Services</h2>
        <div class="service-cards">
            <div class="card">
                <i class="fas fa-cogs"></i>
                <h3>Web Development</h3>
                <p>Custom website development for your business.</p>
            </div>
            <div class="card">
                <i class="fas fa-paint-brush"></i>
                <h3>Design</h3>
                <p>Creative and modern design services for your brand.</p>
            </div>
            <div class="card">
                <i class="fas fa-cloud"></i>
                <h3>Cloud Hosting</h3>
                <p>Reliable and secure cloud hosting solutions.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about" data-aos="fade-left">
        <h2>About Us</h2>
        <p>We are a passionate team working to help you achieve your goals with technology. Our team is dedicated to
            delivering top-notch solutions that meet your needs.</p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact" data-aos="fade-right">
        <h2>Contact Us</h2>
        <p>Get in touch with us for more information!</p>
        <form action="#">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 MyLanding. All Rights Reserved.</p>
    </footer>

    <!-- AOS JS (Animate on Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialize AOS (Animate on Scroll)
        AOS.init();
    </script>
</body>

</html>
