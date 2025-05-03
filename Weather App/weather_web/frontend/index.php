<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #74b9ff;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #2ecc71;
            --warning-color: #f1c40f;
            --danger-color: #e74c3c;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
        }

        header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .logo h1::before {
            content: "☁️";
            margin-right: 10px;
            font-size: 1.5rem;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 1.5rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 0.8rem;
            border-radius: 4px;
            transition: var(--transition);
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .app-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--secondary-color);
            font-size: 2.5rem;
        }

        .app-subtitle {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--dark-color);
            font-size: 1.2rem;
            opacity: 0.8;
        }

        #weather-form {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        #city-name {
            padding: 1rem;
            border: none;
            border-radius: 4px;
            flex-grow: 1;
            max-width: 400px;
            box-shadow: var(--shadow);
            font-size: 1rem;
            transition: var(--transition);
        }

        #city-name:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--primary-color);
        }

        #weather-form input[type="submit"] {
            padding: 1rem 2rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        #weather-form input[type="submit"]:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .weather-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: var(--transition);
        }

        .weather-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        .location {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: var(--secondary-color);
        }

        .location svg {
            margin-right: 0.5rem;
        }

        .weather-info {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 1rem;
        }

        .weather-main {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .temp {
            font-size: 4rem;
            font-weight: 700;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .temp-unit {
            font-size: 1.5rem;
            margin-left: 0.5rem;
        }

        .icon {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        .desc {
            font-size: 1.2rem;
            text-transform: capitalize;
            text-align: center;
            color: var(--dark-color);
        }

        .details {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            padding: 0 1rem;
        }

        .detail-item:not(:last-child) {
            border-right: 1px solid #eee;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .detail-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .forecast-section {
            margin-top: 3rem;
        }

        .forecast-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .forecast-cards {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 1rem;
        }

        .forecast-card {
            min-width: 120px;
            background-color: white;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: var(--transition);
        }

        .forecast-card:hover {
            transform: translateY(-3px);
        }

        .forecast-day {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .forecast-icon {
            font-size: 2rem;
            margin: 0.5rem 0;
        }

        .forecast-temp {
            font-weight: 600;
            color: var(--secondary-color);
        }

        .air-quality {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            background-color: var(--success-color);
            color: white;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0.5rem;
            }
            
            .weather-info {
                flex-direction: column;
            }
            
            .details {
                flex-wrap: wrap;
            }
            
            .detail-item {
                width: 50%;
                margin-bottom: 1rem;
                border-right: none !important;
            }
            
            .detail-item:nth-child(odd) {
                border-right: 1px solid #eee !important;
            }
        }
    </style>
</head>
<body>
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
>
        </nav>
    </header>
    <div class="container">
        <h1 class="app-title">Weather App</h1>
        <p class="app-subtitle">Get accurate weather information for any location</p>
        
        <form id="weather-form">
            <input id="city-name" type="text" placeholder="Enter your city name">
            <input type="submit" value="Get Weather">
        </form>
        
        <div class="weather-card">
            <div class="location">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span>Singapore, SG</span>
            </div>
            
            <div class="weather-info">
                <div class="weather-main">
                    <div class="icon">☀️</div>
                    <div class="temp">29<span class="temp-unit">°C</span></div>
                    <div class="desc">Clear Sky</div>
                </div>
            </div>
            
            <div class="details">
                <div class="detail-item">
                    <span class="detail-label">Humidity</span>
                    <span class="detail-value">65%</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Wind</span>
                    <span class="detail-value">5 km/h</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Pressure</span>
                    <span class="detail-value">1012 hPa</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Air Quality</span>
                    <span class="air-quality">Good</span>
                </div>
            </div>
            
            <div class="details">
                <div class="detail-item">
                    <span class="detail-label">Sunrise</span>
                    <span class="detail-value">6:45 AM</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Sunset</span>
                    <span class="detail-value">7:00 PM</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Feels Like</span>
                    <span class="detail-value">32°C</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Visibility</span>
                    <span class="detail-value">10 km</span>
                </div>
            </div>
        </div>
        
        <div class="forecast-section">
            <h2 class="forecast-title">5-Day Forecast</h2>
            <div class="forecast-cards">
                <div class="forecast-card">
                    <div class="forecast-day">Mon</div>
                    <div class="forecast-icon">🌤️</div>
                    <div class="forecast-temp">30°C</div>
                </div>
                <div class="forecast-card">
                    <div class="forecast-day">Tue</div>
                    <div class="forecast-icon">⛅</div>
                    <div class="forecast-temp">29°C</div>
                </div>
                <div class="forecast-card">
                    <div class="forecast-day">Wed</div>
                    <div class="forecast-icon">🌦️</div>
                    <div class="forecast-temp">28°C</div>
                </div>
                <div class="forecast-card">
                    <div class="forecast-day">Thu</div>
                    <div class="forecast-icon">🌧️</div>
                    <div class="forecast-temp">27°C</div>
                </div>
                <div class="forecast-card">
                    <div class="forecast-day">Fri</div>
                    <div class="forecast-icon">⛅</div>
                    <div class="forecast-temp">29°C</div>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>