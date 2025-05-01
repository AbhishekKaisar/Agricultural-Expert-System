@extends('frontend.master')

@section('title','Weather Update')

@section('body')

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ag-dark-green': '#1a3a2a',
                        'ag-teal': '#2a8a7a',
                    }
                }
            }
        }
    </script>

    <style>
        .vertical-divider {
            width: 1px;
            background-color: rgba(255, 255, 255, 0.3);
            height: 80%;
            margin: 0 1rem;
        }
        .weather-icon {
            width: 64px;
            height: 64px;
        }
        .error-message {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-teal-500">
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Weather Illustration -->
                <div class="flex items-center space-x-8">
                    <!-- Sun -->
                    <div class="w-16 h-16 bg-yellow-400 rounded-full shadow-lg"></div>

                    <!-- Cloud -->
                    <div class="relative">
                        <div class="w-20 h-8 bg-white rounded-full"></div>
                        <div class="w-10 h-10 bg-white rounded-full absolute -top-4 left-2"></div>
                        <div class="w-10 h-10 bg-white rounded-full absolute -top-4 right-2"></div>
                    </div>

                    <!-- Rain Drops -->
                    <div class="flex flex-col items-center">
                        <div class="w-2 h-4 bg-blue-400 rounded-b-full mb-2"></div>
                        <div class="w-2 h-6 bg-blue-400 rounded-b-full mb-2"></div>
                        <div class="w-2 h-4 bg-blue-400 rounded-b-full"></div>
                    </div>

                    <!-- Lightning -->
                    <div class="w-6 h-16 bg-yellow-300 skew-x-12 -skew-y-12"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Weather Forecast Section -->
    <section class="py-12 px-6">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-ag-dark-green mb-8 text-center">Weather Forecast</h2>

            <!-- City Selection -->
            <div class="mb-8 max-w-md mx-auto">
                <div class="flex items-center">
                    <input type="text" id="city-input" placeholder="Enter city name (e.g., New York)"
                           class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-ag-teal">
                    <button id="search-button" class="bg-ag-teal text-white px-4 py-2 rounded-r-lg hover:bg-ag-dark-green transition">
                        Search
                    </button>
                </div>
            </div>

            <!-- Error Message Container -->
            <div id="error-container" class="mb-8 hidden"></div>

            <!-- Loading Indicator -->
            <div id="loading-indicator" class="text-center mb-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-ag-teal"></div>
                <p class="mt-2 text-ag-dark-green">Loading weather data...</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="weather-cards">
                <!-- Weather cards will be dynamically inserted here -->
            </div>
        </div>
    </section>

    <script>
        // OpenWeatherMap API key - in a real application, this should be secured
        const API_KEY = '2421f36a773a369c020704e71ba58f9c'; // Replace with your actual API key
        const DEFAULT_CITY = 'Dhaka';

        // DOM elements
        const weatherCardsContainer = document.getElementById('weather-cards');
        const errorContainer = document.getElementById('error-container');
        const loadingIndicator = document.getElementById('loading-indicator');
        const cityInput = document.getElementById('city-input');
        const searchButton = document.getElementById('search-button');

        // Days of the week
        const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        // Event listeners
        document.addEventListener('DOMContentLoaded', () => {
            fetchWeatherData(DEFAULT_CITY);
            cityInput.value = DEFAULT_CITY;
        });

        searchButton.addEventListener('click', () => {
            const city = cityInput.value.trim();
            if (city) {
                fetchWeatherData(city);
            }
        });

        cityInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const city = cityInput.value.trim();
                if (city) {
                    fetchWeatherData(city);
                }
            }
        });

        // Function to fetch weather data from OpenWeatherMap API
        async function fetchWeatherData(city) {
            // Show loading indicator and hide error
            loadingIndicator.classList.remove('hidden');
            errorContainer.classList.add('hidden');
            weatherCardsContainer.innerHTML = '';

            try {
                // Fetch current weather data
                const currentWeatherResponse = await fetch(
                    `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}&units=metric`
                );

                if (!currentWeatherResponse.ok) {
                    throw new Error(`City not found or API error: ${currentWeatherResponse.statusText}`);
                }

                const currentWeatherData = await currentWeatherResponse.json();

                // Fetch 5-day forecast data
                const forecastResponse = await fetch(
                    `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${API_KEY}&units=metric`
                );

                if (!forecastResponse.ok) {
                    throw new Error(`Forecast data not available: ${forecastResponse.statusText}`);
                }

                const forecastData = await forecastResponse.json();

                // Process and display the weather data
                processWeatherData(currentWeatherData, forecastData);

            } catch (error) {
                console.error('Error fetching weather data:', error);
                showError(error.message);
            } finally {
                // Hide loading indicator
                loadingIndicator.classList.add('hidden');
            }
        }

        // Function to process and display weather data
        function processWeatherData(currentWeather, forecast) {
            // Clear previous cards
            weatherCardsContainer.innerHTML = '';

            // Create card for current weather
            createWeatherCard(
                currentWeather.name + ', ' + currentWeather.sys.country,
                getCurrentDayName(),
                currentWeather.main.temp,
                currentWeather.weather[0].main,
                currentWeather.weather[0].icon,
                true
            );

            // Process forecast data - get one forecast per day (excluding today)
            const dailyForecasts = {};
            const today = new Date().getDate();

            forecast.list.forEach(item => {
                const date = new Date(item.dt * 1000);
                const day = date.getDate();

                // Skip today's forecasts
                if (day !== today && !dailyForecasts[day]) {
                    dailyForecasts[day] = item;
                }
            });

            // Create cards for the next 3 days
            Object.values(dailyForecasts).slice(0, 3).forEach(item => {
                const date = new Date(item.dt * 1000);
                const dayName = daysOfWeek[date.getDay()];

                createWeatherCard(
                    forecast.city.name + ', ' + forecast.city.country,
                    dayName,
                    item.main.temp,
                    item.weather[0].main,
                    item.weather[0].icon,
                    false
                );
            });
        }

        // Function to create a weather card
        function createWeatherCard(location, day, tempC, weatherType, iconCode, isToday) {
            const tempF = (tempC * 9/5) + 32;

            const card = document.createElement('div');
            card.className = 'bg-ag-teal rounded-lg shadow-md overflow-hidden text-white';

            const todayIndicator = isToday ?
                '<span class="absolute top-2 right-2 bg-yellow-400 text-ag-dark-green text-xs font-bold px-2 py-1 rounded-full">Today</span>' : '';

            card.innerHTML = `
            <div class="flex items-center h-full relative">
                ${todayIndicator}
                <div class="flex-1 p-6 flex items-center">
                    <div class="text-center">
                        <img src="https://openweathermap.org/img/wn/${iconCode}@2x.png" alt="${weatherType}" class="weather-icon mx-auto">
                        <div class="text-lg font-medium">${weatherType}</div>
                    </div>
                </div>
                <div class="vertical-divider"></div>
                <div class="flex-1 p-6">
                    <div class="mb-1 text-sm">${location}</div>
                    <div class="mb-2 font-medium">${day}</div>
                    <div class="text-3xl font-bold">${Math.round(tempC)}°</div>
                    <div class="text-sm opacity-80">${Math.round(tempF)}°F</div>
                </div>
            </div>
        `;

            weatherCardsContainer.appendChild(card);

            // ✅ Save weather to database
            saveWeatherData(location, day, tempC, tempF, weatherType, iconCode, isToday);
        }

        // Function to get the current day name
        function getCurrentDayName() {
            const today = new Date();
            return daysOfWeek[today.getDay()];
        }

        // Function to show error message
        function showError(message) {
            errorContainer.classList.remove('hidden');
            errorContainer.innerHTML = `
            <div class="error-message">
                <p><strong>Error:</strong> ${message}</p>
                <p class="mt-2">Please check the city name and try again, or try later if the weather service is unavailable.</p>
            </div>
        `;
        }

        // ✅ Function to save weather data to Laravel backend
        function saveWeatherData(location, day, tempC, tempF, weatherType, iconCode, isToday) {
            const [city, country] = location.split(',').map(s => s.trim());

            fetch('{{ route('save-weather') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    city: city,
                    country: country,
                    day: day,
                    temperature_celsius: tempC,
                    temperature_fahrenheit: tempF,
                    weather_type: weatherType,
                    icon_code: iconCode,
                    is_today: isToday ? 1 : 0
                })
            })
                .then(response => response.json())
                .then(data => console.log('Weather saved:', data))
                .catch(error => console.error('Error saving weather:', error));
        }
    </script>

@endsection
