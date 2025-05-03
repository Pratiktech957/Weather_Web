<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Weather+ Pro - Alerts</title>
  <link rel="stylesheet" href="Alert.css" />
</head>
<body class="alerts-page">

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

  <section class="hero">
    <div class="hero-content">
      <h1>Weather Alerts</h1>
      <p>Stay informed with real-time alerts on storms, extreme weather, and more.</p>
    </div>
  </section>

  <section class="alerts-section">
    <h2>Active Weather Alerts</h2>
    <div id="alerts-list">
      <div class="loading-spinner">Loading...</div>
    </div>
  </section>

  <section class="important-links-section">
    <h2>Important Links</h2>
    <ul>
      <li><a href="https://www.weather.gov" target="_blank">National Weather Service</a></li>
      <li><a href="https://www.ready.gov" target="_blank">Ready.gov - Disaster Preparedness</a></li>
      <li><a href="https://www.cdc.gov/disasters" target="_blank">CDC - Weather-Related Safety</a></li>
    </ul>
  </section>

  <section class="user-tips-section">
    <h2>Safety Tips</h2>
    <ul>
      <li><strong>Stay Informed:</strong> Keep updated on weather conditions through official channels.</li>
      <li><strong>Emergency Kit:</strong> Keep an emergency kit with essentials like food, water, and medical supplies.</li>
      <li><strong>Follow Warnings:</strong> Always heed official weather warnings and evacuation orders.</li>
    </ul>
  </section>

  <footer>
    <p>© 2025 Weather+ Pro. Built with OpenWeather API.</p>
  </footer>

  <script>
    async function getWeatherAlerts() {
      navigator.geolocation.getCurrentPosition(async (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        const apiKey = "YOUR_API_KEY"; // Replace with your real OpenWeather API key
        const url = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&appid=${apiKey}`;

        try {
          const res = await fetch(url);
          const data = await res.json();

          const alerts = data.alerts || [];
          const alertsContainer = document.getElementById('alerts-list');

          if (alerts.length > 0) {
            const html = alerts.map(alert => `
              <div class="alert-card">
                <h3>${alert.event}</h3>
                <button class="toggle-details">Show Details</button>
                <div class="alert-details" style="display:none;">
                  <p><strong>Description:</strong> ${alert.description}</p>
                  <p><strong>Start:</strong> ${new Date(alert.start * 1000).toLocaleString()}</p>
                  <p><strong>End:</strong> ${new Date(alert.end * 1000).toLocaleString()}</p>
                </div>
              </div>
            `).join('');
            alertsContainer.innerHTML = html;

            document.querySelectorAll('.toggle-details').forEach(button => {
              button.addEventListener('click', function () {
                const details = this.nextElementSibling;
                const show = details.style.display === "none";
                details.style.display = show ? "block" : "none";
                this.textContent = show ? "Hide Details" : "Show Details";
              });
            });
          } else {
            alertsContainer.innerHTML = "<p>No active alerts.</p>";
          }
        } catch (error) {
          document.getElementById('alerts-list').innerHTML = "<p>Error fetching alerts.</p>";
        }
      });
    }

    getWeatherAlerts();
    setInterval(getWeatherAlerts, 300000); // every 5 min
  </script>

</body>
</html>
