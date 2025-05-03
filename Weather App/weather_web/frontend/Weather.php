
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather+ Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .logo h1 {
            font-size: 28px;
            color: #0077b6;
        }

        nav ul {
            display: flex;
            gap: 20px;
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            color: #0077b6;
            font-weight: 600;
        }

        nav ul li a:hover {
            color: #023e8a;
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .auth-buttons a {
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #0077b6;
            border-radius: 5px;
            color: #0077b6;
            transition: 0.3s;
        }

        .auth-buttons a:hover {
            background-color: #0077b6;
            color: #fff;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
        }

        .hero h1 {
            font-size: 48px;
            color: #023e8a;
        }

        .hero p {
            font-size: 18px;
            margin: 20px 0;
            color: #555;
        }

        .cta-button {
            text-decoration: none;
            background-color: #0077b6;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .cta-button:hover {
            background-color: #023e8a;
        }

        .features {
            padding: 60px 20px;
            background-color: #f9f9f9;
        }

        .features h2 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 40px;
            color: #023e8a;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .feature-card img {
            width: 60px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            font-size: 20px;
            color: #0077b6;
        }

        .feature-card p {
            font-size: 15px;
            color: #555;
        }

        .about-section, .testimonial-section, .newsletter-section {
            padding: 60px 20px;
            text-align: center;
        }

        .about-section h2, .testimonial-section h2, .newsletter-section h2 {
            font-size: 30px;
            color: #023e8a;
            margin-bottom: 20px;
        }

        .about-section p, .testimonial-section p, .newsletter-section p {
            font-size: 16px;
            color: #444;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .newsletter-section form {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .newsletter-section input[type="email"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 250px;
        }

        .newsletter-section button {
            padding: 10px 20px;
            background: #0077b6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .newsletter-section button:hover {
            background-color: #023e8a;
        }

        footer {
            background-color: #0077b6;
            color: white;
            text-align: center;
            padding: 20px;
        }

    </style>
</head>

<body>
    <header>
        <div class="logo">
            <h1>Weather+ Pro</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="login.php">Sign In</a>
            <a href="signup.php">Sign Up</a>
        </div>
    </header>

    <section class="hero">
        <h1>Experience Weather Like Never Before</h1>
        <p>Stay updated with real-time forecasts, air quality, and more.</p>
        <a href="#features" class="cta-button">Explore Features</a>
    </section>

    <section class="features" id="features">
        <h2>Features You'll Love</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/100/000000/weather-forecast.png" alt="Forecast">
                <h3>5-Day Forecast</h3>
                <p>Plan your week with accurate and detailed forecasts.</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/100/000000/air-quality.png" alt="Air Quality">
                <h3>Air Quality</h3>
                <p>Track air pollution and stay informed.</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/100/000000/warning-shield.png" alt="Alerts">
                <h3>Weather Alerts</h3>
                <p>Instant alerts for storms and weather extremes.</p>
            </div>
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/100/000000/radar.png" alt="Radar">
                <h3>Live Radar</h3>
                <p>Visualize weather changes in real-time.</p>
            </div>
        </div>
    </section>

    <section class="about-section" id="about">
        <h2>Why Weather+ Pro?</h2>
        <p>We're dedicated to delivering the most accurate and easy-to-understand weather data to help you plan better and stay safe. Join our growing community of weather-conscious users today.</p>
    </section>

    <section class="testimonial-section">
        <h2>What Our Users Say</h2>
        <p>“This is the most accurate and visually appealing weather app I’ve ever used!” – Alex R.</p>
    </section>

    <section class="newsletter-section" id="contact">
        <h2>Stay Updated</h2>
        <p>Subscribe to our newsletter to get the latest updates, tips, and alerts.</p>
        <form>
            <input type="email" placeholder="Enter your email">
            <button type="submit">Subscribe</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Weather+ Pro. All rights reserved.</p>
    </footer>
</body>

</html>