
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather+ Pro - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="home.css">
</head>


<body class="home-page">

<header>
        <div class="logo">
            <h1>Weather App</h1>
        </div>
        <nav>
            <ul>
                <li><a href="HomePage.php">Home</a></li>
                <li><a href="ForeCast.php">Forecast</a></li>
                <li><a href="index.php">Weather</a></li>
                <li><a href="Alert.php">Alerts</a></li>
                <li><a href="blog.php">Blog</a></li>

        </nav>
    </header>
    <div class="welcome-banner">
    <h2>Hello 👋, <?php echo $_SESSION['email']; ?>!</h2>
    <p>Welcome to <strong>Weather+ Pro</strong> — your personal weather companion ☁️</p>
</div>


    <section class="hero">
        <div class="hero-content">
            <h1>Stay Ahead with Weather+ Pro</h1>
            <p>Get accurate forecasts, real-time radar, and local air quality — all in one place.</p>
            <a href="#" class="cta-button">Check Weather Now</a>
        </div>
    </section>

    <section class="features">
        <h2>Features</h2>
        <div class="feature-grid">
            <!-- Feature 1: 5-Day Forecast -->
            <div class="feature-card">
            <i class="fas fa-cloud-sun fa-3x"></i>

                <h3>5-Day Forecast</h3>
                <p>Plan ahead with reliable 5-day weather trends.</p>
            </div>
            
            <!-- Feature 2: Live Radar -->
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/452/radar.png" alt="Radar Icon">
                <h3>Live Radar</h3>
                <p>Visualize weather patterns and storms in real time.</p>
            </div>
            
            <!-- Feature 3: Weather Alerts -->
            <div class="feature-card">
                <!-- Ensure this path is correct -->
                <img src="https://img.icons8.com/ios-filled/100/000000/error.png" alt="Alert Icon">
                <h3>Weather Alerts</h3>
                <p>Get notified for storms, extreme heat, or cold snaps.</p>
            </div>
            
            <!-- Feature 4: Air Quality -->
            <div class="feature-card">
                <img src="https://img.icons8.com/ios/452/air-quality.png" alt="Air Quality Icon">
                <h3>Air Quality</h3>
                <p>Track air pollution and stay informed about health risks.</p>
            </div>
        </div>
    </section>
    

    <footer>
        <p>© 2025 Weather+ Pro. Built with OpenWeather API.</p>
    </footer>

    <script src="home.js"></script>
</body>
</html>
