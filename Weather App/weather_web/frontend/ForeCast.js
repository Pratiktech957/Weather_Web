const apiKey = "20da423906ccf27bec8c2d81c8f4a2eb"; 
const forecastGrid = document.querySelector(".forecast-grid");

async function getForecast(city) {
    try {
        const response = await fetch(
            `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}&units=metric`
        );

        if (!response.ok) {
            throw new Error("City not found or unable to fetch forecast.");
        }

        const data = await response.json();

        // Filter the forecast data to get the daily forecast (every 8th entry in the list)
        const forecastData = data.list.filter((item, index) => index % 8 === 0); // Data is updated every 3 hours, so we take every 8th item (24 hours).

        // Clear existing forecast cards
        forecastGrid.innerHTML = '';

        forecastData.forEach(item => {
            const date = new Date(item.dt * 1000); // Convert UNIX timestamp to Date
            const day = date.toLocaleDateString('en-US', { weekday: 'long', month: 'short', day: 'numeric' });
            const icon = item.weather[0].icon;
            const temperature = Math.floor(item.main.temp); // Convert to Celsius (rounded)
            const description = item.weather[0].description;

            // Create the forecast card
            const forecastCard = document.createElement("div");
            forecastCard.classList.add("forecast-card");
            forecastCard.innerHTML = `
                <img src="https://openweathermap.org/img/wn/${icon}.png" alt="Weather Icon">
                <h3>${day}</h3>
                <p class="temp">${temperature}°C</p>
                <p>${description}</p>
            `;
            
            // Append the card to the forecast grid
            forecastGrid.appendChild(forecastCard);
        });
    } catch (error) {
        console.error("Error fetching forecast data:", error);
    }
}

// Get forecast for the desired city (replace 'London' with any city)
getForecast("London");  // Replace 'London' with the city of your choice

