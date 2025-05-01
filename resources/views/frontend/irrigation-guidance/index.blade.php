@extends('frontend.master')

@section('title','Irrigation Guidance')

@section('body')

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#5b9a8b',
                        'primary-dark': '#4a8a7b',
                        'blue-gradient-start': '#6b8af8',
                        'blue-gradient-end': '#5d7ef7',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            padding: 2rem;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex flex-col justify-center items-center">
            <div class="text-white text-sm mb-2">
                <a href="#" class="hover:underline">HOME</a> / <a href="#" class="hover:underline">OUR SOLUTIONS</a>
            </div>
            <h1 class="text-4xl font-bold text-white">Irrigation Guidance</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- AI Based Recommendation Card -->
            <div>
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/20 mr-3">
                        <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.0001 1L15.0001 7L21.0001 8L16.5001 13L18.0001 19L12.0001 16L6.00006 19L7.50006 13L3.00006 8L9.00006 7L12.0001 1Z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-medium text-primary">AI Based Recommendation</h2>
                </div>

                <div class="flex items-start">
                    <div class="w-12 h-12 flex-shrink-0 rounded-full bg-blue-600 flex items-center justify-center mr-4 mt-1">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.94996 4.00002C7.94996 2.34317 9.29311 1.00002 10.95 1.00002C12.6068 1.00002 13.95 2.34317 13.95 4.00002C13.95 5.65687 12.6068 7.00002 10.95 7.00002C9.29311 7.00002 7.94996 5.65687 7.94996 4.00002Z" />
                        </svg>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6 flex-grow">
                        <p class="text-gray-800 leading-relaxed">
                            {{ $recommendation ?? 'No irrigation guidance available at the moment.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Weather Card (no change, keep all) -->
            <div class="bg-gradient-to-br from-blue-gradient-start to-blue-gradient-end rounded-lg shadow-lg overflow-hidden">
                <div class="relative">
                    <div id="weather-icon-container" class="absolute top-0 right-0 w-24 h-24">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <circle cx="70" cy="30" r="20" fill="#ffde17"/>
                        </svg>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center mb-6 relative">
                            <h3 id="location-name" class="text-xl font-medium text-white">Loading...</h3>
                        </div>

                        <div class="text-center mb-6">
                            <p id="current-date" class="text-white mb-1">Loading...</p>
                            <div id="temperature" class="text-white text-7xl font-bold mb-2">--°</div>
                            <p id="weather-condition" class="text-white text-xl">Loading...</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <div>
                                    <p class="text-white text-sm">Wind</p>
                                    <p id="wind-speed" class="text-white font-medium">-- kmph</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div>
                                    <p class="text-white text-sm">Precipitation</p>
                                    <p id="precipitation" class="text-white font-medium">--%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Weather Script (full and original) -->
        <script>
            const API_KEY = '2421f36a773a369c020704e71ba58f9c'; // ✅ Your Weather API Key

            const locationName = document.getElementById('location-name');
            const currentDate = document.getElementById('current-date');
            const temperature = document.getElementById('temperature');
            const weatherCondition = document.getElementById('weather-condition');
            const windSpeed = document.getElementById('wind-speed');
            const precipitation = document.getElementById('precipitation');
            const weatherIconContainer = document.getElementById('weather-icon-container');

            let currentCity = 'Dhaka';
            let currentCountry = 'BD';

            function formatDate(date) {
                const options = { weekday: 'long', day: 'numeric', month: 'long' };
                return date.toLocaleDateString('en-US', options);
            }

            async function fetchWeatherData(city, country) {
                try {
                    locationName.textContent = 'Loading...';
                    const weatherResponse = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&units=metric&appid=${API_KEY}`);
                    const weatherData = await weatherResponse.json();

                    const forecastResponse = await fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${city},${country}&units=metric&appid=${API_KEY}`);
                    const forecastData = await forecastResponse.json();

                    const precipProbability = forecastData.list[0]?.pop * 100;

                    const now = new Date();
                    locationName.textContent = city;
                    currentDate.textContent = `Today, ${now.getDate()} ${now.toLocaleString('default', { month: 'long' })}`;
                    temperature.textContent = `${Math.round(weatherData.main.temp)}°`;
                    weatherCondition.textContent = weatherData.weather[0].main;
                    windSpeed.textContent = `${Math.round(weatherData.wind.speed * 3.6)} kmph`;
                    precipitation.textContent = `${Math.round(precipProbability || 0)}%`;
                } catch (error) {
                    console.error('Weather error:', error);
                }
            }

            fetchWeatherData(currentCity, currentCountry);
            setInterval(() => fetchWeatherData(currentCity, currentCountry), 30 * 60 * 1000);
        </script>
    </section>

@endsection
