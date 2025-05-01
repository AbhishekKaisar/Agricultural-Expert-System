@extends('frontend.master')

@section('title','Home')

@section('body')

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'primary': '#5b9a8b',
                    'primary-dark': '#2f4f4f',
                    'field-yellow': '#eec643',
                    'primary-light': '#7ab5a6',
                    'secondary': '#e6c34a',
                    'secondary-dark': '#d4b43a',
                    'bg-green': '#2f4f4f',
                    'bg-green-light': '#3d6363',
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
                animation: {
                    'float': 'float 3s ease-in-out infinite',
                    'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    'sway': 'sway 5s ease-in-out infinite',
                    'rain-drop': 'rain-drop 1.5s linear infinite',
                },
                keyframes: {
                    float: {
                        '0%, 100%': { transform: 'translateY(0)' },
                        '50%': { transform: 'translateY(-10px)' },
                    },
                    sway: {
                        '0%, 100%': { transform: 'rotate(-2deg)' },
                        '50%': { transform: 'rotate(2deg)' },
                    },
                    'rain-drop': {
                        '0%': { transform: 'translateY(0)', opacity: 1 },
                        '100%': { transform: 'translateY(20px)', opacity: 0 },
                    }
                }
            }
        }
    }
</script>
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
    }
    .pattern-bg {
        background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='1'/%3E%3Ccircle cx='13' cy='13' r='1'/%3E%3C/g%3E%3C/svg%3E");
    }
    .glass {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
    }
    .weather-card {
        transition: all 0.3s ease;
    }
    .weather-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
    }
    .spinner {
        width: 50px;
        height: 50px;
        border: 5px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #5b9a8b;
        animation: spin 1s ease-in-out infinite;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .rain {
        position: absolute;
        width: 2px;
        height: 10px;
        background-color: #80b6f4;
        border-radius: 2px;
    }
    .rain:nth-child(1) { left: 40%; top: 65%; animation: rain-drop 1.5s linear infinite; }
    .rain:nth-child(2) { left: 50%; top: 70%; animation: rain-drop 1.8s linear infinite 0.2s; }
    .rain:nth-child(3) { left: 60%; top: 65%; animation: rain-drop 1.6s linear infinite 0.4s; }

    .wheat-stalk {
        position: relative;
        width: 2px;
        height: 60px;
        background-color: #d4b43a;
        display: inline-block;
        margin: 0 8px;
    }
    .wheat-stalk::before {
        content: '';
        position: absolute;
        top: 5px;
        left: -5px;
        width: 12px;
        height: 4px;
        background-color: #eec643;
        transform: rotate(30deg);
    }
    .wheat-stalk::after {
        content: '';
        position: absolute;
        top: 12px;
        left: -5px;
        width: 12px;
        height: 4px;
        background-color: #eec643;
        transform: rotate(30deg);
    }
    .forecast-scroll {
        overflow-x: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(91, 154, 139, 0.5) transparent;
    }
    .forecast-scroll::-webkit-scrollbar {
        height: 6px;
    }
    .forecast-scroll::-webkit-scrollbar-track {
        background: transparent;
    }
    .forecast-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(91, 154, 139, 0.5);
        border-radius: 20px;
    }
    .hourly-item {
        min-width: 100px;
    }
</style>

<!-- Hero Section -->
<section class="relative h-[500px] bg-primary-dark pattern-bg overflow-hidden">
    <!-- Yellow field at bottom -->
    <div class="absolute bottom-0 w-full h-[120px] bg-field-yellow z-10"></div>

    <!-- Wheat fields -->
    <div class="absolute bottom-0 left-0 w-full h-[120px] z-20">
        <div class="flex">
            <!-- Repeating wheat stalks -->
            <div class="flex space-x-4 ml-4 mt-4">
                <!-- Multiple wheat stalks -->
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
            </div>
            <!-- More wheat stalks to fill the width -->
            <div class="flex space-x-4 ml-8 mt-4">
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
                <div class="relative h-[80px] w-[15px]">
                    <div class="absolute w-[2px] h-full bg-yellow-700 left-1/2 transform -translate-x-1/2"></div>
                    <div class="absolute top-[10px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                    <div class="absolute top-[25px] w-[10px] h-[15px] bg-yellow-600 left-1/2 transform -translate-x-1/2 rotate-30"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mountains in background -->
    <div class="absolute bottom-[120px] w-full z-5">
        <svg viewBox="0 0 1200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 200L200 100L400 150L600 50L800 120L1000 80L1200 150V200H0Z" fill="#4A7C7C" />
        </svg>
    </div>

    <!-- Small houses on right -->
    <div class="absolute bottom-[30px] right-[20%] z-30">
        <div class="flex space-x-4">
            <div class="relative">
                <div class="w-8 h-6 bg-red-500"></div>
                <div class="w-8 h-4 bg-red-700" style="clip-path: polygon(0 0, 100% 0, 50% 100%);"></div>
            </div>
            <div class="relative">
                <div class="w-10 h-8 bg-red-600"></div>
                <div class="w-10 h-5 bg-red-800" style="clip-path: polygon(0 0, 100% 0, 50% 100%);"></div>
            </div>
        </div>
    </div>

    <!-- Heading -->
    <div class="relative z-30 pt-16 px-8 text-center md:text-left max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">Smart Farming Starts with Your Soil</h1>
        <p class="text-white text-lg">Empowering Farmers Through Smart Agriculture.</p>
    </div>

    <!-- Search Bar -->
    <!-- <div class="absolute top-4 left-1/2 transform -translate-x-1/2 z-30 w-full max-w-md px-4">
        <div class="relative">
            <input id="cityInput" type="text" placeholder="Search for a city..."
                class="w-full px-4 py-2 pr-10 rounded-full border-2 border-white bg-white/20 backdrop-blur-sm text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-primary">
            <button id="searchBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-white p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </div> -->
</section>

<!-- Info Section -->
<section class="py-12 px-4 md:px-8 max-w-7xl mx-auto text-center">
    <h2 class="text-2xl font-bold mb-2">Control how you share your farm data<br>customize your profile for tailored recommendations.</h2>
    <p class="text-gray-600 mb-12">Say goodbye to old farming methods. Say hello to smarter, data-driven decisions.</p>
</section>

<!-- Solutions Section -->
<section class="pb-12 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Weather Update -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Weather Update" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('weather-update')}}" class="text-xl font-bold text-gray-800">
                    Weather<br />
                    Update
                </a>
            </div>
        </div>

        <!-- User Management -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="User Management" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('user-management')}}" class="text-xl font-bold text-gray-800">
                    User<br />
                    Management
                </a>
            </div>
        </div>

        <!-- Soil Data Input and Analysis -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Soil Data Input and Analysis" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('soil-data-analysis')}}" class="text-xl font-bold text-gray-800">
                    Soil Data Input<br />
                    And Analysis
                </a>
            </div>
        </div>

        <!-- Crop and Fertilizer Recommendations -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Crop and Fertilizer Recommendations" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('crop-fertilizer')}}" class="text-xl font-bold text-gray-800">
                    Crop And<br />
                    Fertilizer
                </a>
            </div>
        </div>

        <!-- Data Storage -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1516937941344-00b4e0337589?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Data Storage" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('data-storage')}}" class="text-xl font-bold text-gray-800">
                    Data Storage
                </a>
            </div>
        </div>

        <!-- Irrigation Guidance -->
        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1500651230702-0e2d8a49d4ad?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Irrigation Guidance" class="w-full h-64 object-cover" />
            <div class="bg-gray-100 p-6">
                <a href="{{route('irrigation-guidance')}}" class="text-xl font-bold text-gray-800">
                    Irrigation<br />
                    Guidance
                </a>
            </div>
        </div>
    </div>

    <!-- Read More Button -->
    <div class="text-center mt-8">
        <button class="flex items-center mx-auto text-gray-700 hover:text-primary">
            <span class="mr-2">Read More</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</section>


@endsection
