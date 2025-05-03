<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Blog</title>
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            background: linear-gradient(90deg, #FFEB3B, #FF9800);
            color: #fff;
            padding: 60px 20px;
            text-align: center;
        }

        header h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin-top: 20px;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 500;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Blog Section */
        .blog-container {
            padding: 60px 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #666;
        }

        .btn-gradient {
            background-color: #FF9800;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .btn-gradient:hover {
            background-color: #f57c00;
        }

        /* Footer */
        footer {
            background: #1E2A38;
            color: white;
            padding: 60px 20px 30px;
        }

        footer h5 {
            font-weight: bold;
        }

        .social-icons a {
            margin: 0 10px;
            color: white;
            font-size: 1.5rem;
        }

        .social-icons a:hover {
            color: #FF9800;
        }

        .footer-bottom {
            background-color: #131C29;
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom a {
            color: #FFEB3B;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer-bottom a:hover {
            color: #FF9800;
        }
    </style>
</head>

<body>

<<header>
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

    <!-- Blog Cards -->
    <div class="container blog-container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="Image/img_01.jpg" class="card-img-top" alt="Forecasting">
                    <div class="card-body">
                        <h5 class="card-title">The Science of Weather Forecasting</h5>
                        <p class="card-text">Learn how meteorologists predict the weather and how accurate their forecasts really are.</p>
                        <a href="#" class="btn btn-gradient">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="Image/img_01.jpg" class="card-img-top" alt="Weather Patterns">
                    <div class="card-body">
                        <h5 class="card-title">Understanding Weather Patterns</h5>
                        <p class="card-text">Explore how different weather patterns form and how they affect our daily lives.</p>
                        <a href="#" class="btn btn-gradient">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="Image/img_01.jpg" class="card-img-top" alt="Climate Change">
                    <div class="card-body">
                        <h5 class="card-title">Climate Change: What You Need to Know</h5>
                        <p class="card-text">An in-depth look at the impact of climate change on weather patterns worldwide.</p>
                        <a href="#" class="btn btn-gradient">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-4">
                    <h5>About Us</h5>
                    <p>We provide accurate weather insights to keep you informed and prepared for every forecast.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Newsletter</h5>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-gradient" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Weather Blog. All Rights Reserved.</p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a>
        </div>
    </footer>

</body>

</html>
