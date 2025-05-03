
const apiKey = "20da423906ccf27bec8c2d81c8f4a2eb";
const weatherForm = document.getElementById("weather-form");
const cityInput = document.getElementById("city-name");

// Main Card Selectors
const locationEle = document.querySelector(".location span");
const iconEle = document.querySelector(".icon");
const tempEle = document.querySelector(".temp");
const descEle = document.querySelector(".desc");

// Detail Sections
const details1 = document.querySelectorAll(".details")[0].querySelectorAll(".detail-item");
const details2 = document.querySelectorAll(".details")[1].querySelectorAll(".detail-item");

// Forecast container
const forecastContainer = document.querySelector(".forecast-cards");

// AQI Levels Mapping
const aqiLevels = ["Good", "Fair", "Moderate", "Poor", "Very Poor"];
const aqiColors = ["#2ecc71", "#f1c40f", "#e67e22", "#e74c3c", "#8e44ad"];

// Form Submit
weatherForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const city = cityInput.value.trim();
    if (city) {
        getWeather(city);
        cityInput.value = "";
    }
});

// Fetch Weather + Forecast + AQI
async function getWeather(city) {
    try {
        // Reset previous content
        iconEle.innerHTML = "⌛";
        tempEle.textContent = "Loading...";
        descEle.textContent = "";
        forecastContainer.innerHTML = "";

        // Fetch current weather
        const weatherRes = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
        if (!weatherRes.ok) throw new Error("City not found");
        const weatherData = await weatherRes.json();

        // Coordinates for AQI & Forecast
        const { lat, lon } = weatherData.coord;

        // Fetch AQI
        const aqiRes = await fetch(`https://api.openweathermap.org/data/2.5/air_pollution?lat=${lat}&lon=${lon}&appid=${apiKey}`);
        const aqiData = await aqiRes.json();
        const aqi = aqiData.list[0].main.aqi;

        // Fetch 5-day forecast
        const forecastRes = await fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`);
        const forecastData = await forecastRes.json();

        // Update Current Weather UI
        const { name, sys, main, wind, weather, visibility } = weatherData;
        locationEle.textContent = `${name}, ${sys.country}`;
        tempEle.innerHTML = `${Math.round(main.temp)}<span class="temp-unit">°C</span>`;
        descEle.textContent = weather[0].description;

        const iconCode = weather[0].icon;
        iconEle.innerHTML = `<img src="https://openweathermap.org/img/wn/${iconCode}@4x.png" alt="Icon">`;

        // Details 1
        details1[0].querySelector(".detail-value").textContent = `${main.humidity}%`;
        details1[1].querySelector(".detail-value").textContent = `${Math.round(wind.speed)} km/h`;
        details1[2].querySelector(".detail-value").textContent = `${main.pressure} hPa`;
        const airQualityTag = details1[3].querySelector(".air-quality");
        airQualityTag.textContent = aqiLevels[aqi - 1];
        airQualityTag.style.backgroundColor = aqiColors[aqi - 1];

        // Details 2
        const feelsLike = Math.round(main.feels_like);
        const sunrise = new Date(sys.sunrise * 1000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const sunset = new Date(sys.sunset * 1000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const visibilityKm = (visibility / 1000).toFixed(1);

        details2[0].querySelector(".detail-value").textContent = sunrise;
        details2[1].querySelector(".detail-value").textContent = sunset;
        details2[2].querySelector(".detail-value").textContent = `${feelsLike}°C`;
        details2[3].querySelector(".detail-value").textContent = `${visibilityKm} km`;

        // Background Theme
        changeBackgroundTheme(weather[0].main.toLowerCase());

        // Build Forecast Cards
        const daily = groupForecastByDay(forecastData.list);
        Object.keys(daily).slice(0, 5).forEach(day => {
            const dayData = daily[day][Math.floor(daily[day].length / 2)];
            const icon = dayData.weather[0].icon;
            const temp = Math.round(dayData.main.temp);

            forecastContainer.innerHTML += `
                <div class="forecast-card">
                    <div class="forecast-day">${day}</div>
                    <div class="forecast-icon"><img src="https://openweathermap.org/img/wn/${icon}.png" alt=""></div>
                    <div class="forecast-temp">${temp}°C</div>
                </div>`;
        });

    } catch (err) {
        alert(err.message);
    }
}

// Group forecast data by date
function groupForecastByDay(dataList) {
    const grouped = {};
    dataList.forEach(item => {
        const date = new Date(item.dt_txt).toLocaleDateString('en-US', { weekday: 'short' });
        if (!grouped[date]) grouped[date] = [];
        grouped[date].push(item);
    });
    return grouped;
}

// Background color changer
function changeBackgroundTheme(condition) {
    document.body.style.transition = "background 0.5s ease-in-out";

    const themes = {
        clear: "#fdfbfb",
        clouds: "#d7d2cc",
        rain: "#5f9ea0",
        thunderstorm: "#2c3e50",
        drizzle: "#87ceeb",
        snow: "#e6dada",
        mist: "#bdc3c7",
        haze: "#95a5a6"
    };

    document.body.style.background = `linear-gradient(135deg, ${themes[condition] || "#f5f7fa"}, #c3cfe2)`;
}

