# 🌤️ Weather Web Application

A full-stack weather web application built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**. This app allows users to search for live weather updates of any city using the OpenWeatherMap API. Optionally, recent searches can be stored in a MySQL database.

---

## 📌 Features

- 🌍 Real-time weather search by city
- 📡 API integration with OpenWeatherMap
- 🖥️ Clean, responsive UI using HTML & CSS
- ⚙️ Dynamic interactivity via JavaScript
- 🛠 Backend processing with PHP
- 💾 MySQL database for storing user/recent search data (optional)

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL  
- **API Used**: [OpenWeatherMap API]([https://openweathermap.org/api](https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric))

---

## 📂 Folder Structure

weather-web/
│
├── index.html # Main user interface
├── style.css # Styling file
├── script.js # JavaScript logic (API calls)
├── weather.php # Backend PHP script
├── db_config.php # MySQL DB config
├── recent_searches.sql # (Optional) DB dump for recent searches
├── screenshots/ # App screenshots for documentation
└── README.md # Project documentation


---

const apiKey = "20da423906ccf27bec8c2d81c8f4a2ebE";
Run the project locally using XAMPP:

Place the project in htdocs or your server root

Access it via http://localhost/WEATHER%20APP/weather_web/frontend/Weather.php

🧪 Example Code (API Call)
javascript
Copy
Edit
fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=YOUR_API_KEY`)
  .then(response => response.json())
  .then(data => {
    // Display weather data
  });
📸 Screenshots
Place your screenshots inside a screenshots/ folder and reference them here.



🎥 Video Walkthrough (Script & Recording Plan)
You can record your screen using OBS Studio (free software).

🎬 Video Script (2–3 mins)
🟢 Intro (10 sec)
"Hi everyone! Welcome to this demo of my Weather Web App built using HTML, CSS, JavaScript, PHP, and MySQL."

🌐 Homepage (10 sec)
"Here is the homepage. It has a search bar where users can type a city name and get the current weather."

🔍 Weather Search (30 sec)
"Let me search for 'New York'. You can see it's fetching the data live using OpenWeatherMap API and showing weather details like temperature, humidity, and conditions."

🧠 Code Overview (30 sec)
Open script.js and show the fetch call to API.

Open weather.php and explain backend PHP handling (if used).

Show db_config.php and recent search logic (optional).

🗃️ Database View (Optional, 20 sec)
Open PHPMyAdmin or your DB tool.


🛑 Outro (10 sec)
"That’s all for this project! You can find the code and setup guide in the GitHub repository. Thanks for watching!"

📃 License
This project is licensed under the MIT License - feel free to use and modify.

🙋‍♂️ Author
Pratik Mohanty
Email: praj24196@gmail.com
GitHub:Pratiktech957 
