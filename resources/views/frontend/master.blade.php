<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen">
<!-- Navigation Bar -->
<nav class="bg-white px-6 py-4 flex items-center justify-between shadow-sm">
    <div class="text-2xl font-medium text-emerald-600">Agricultural Expert System</div>

    <!-- Desktop Menu -->
    <div class="hidden md:flex items-center space-x-6">
        <a href="{{route('home')}}" class="text-black hover:text-emerald-600 font-medium">Home</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">About</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">Services</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">Projects</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">News</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">Shop</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600">Contact</a>
    </div>

    <!-- Mobile Menu Button -->
    <button class="md:hidden text-gray-500 focus:outline-none" id="mobile-menu-button">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <div class="flex items-center space-x-4">
{{--        <a href="{{route('login')}}" class="bg-emerald-600 text-white px-6 py-2 rounded-full hover:bg-emerald-700 transition">--}}
{{--            Login--}}
{{--        </a>--}}
        @auth
            <div class="flex items-center space-x-4">
        <span class="bg-emerald-600 text-white px-6 py-2 rounded-full">
            {{ Auth::user()->name }}
        </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" class="bg-emerald-600 text-white px-6 py-2 rounded-full hover:bg-emerald-700 transition">
                Login
            </a>
        @endauth
        <div class="flex items-center space-x-3">
            <!-- Search Icon -->
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <!-- Cart Icon with Badge -->
            <div class="relative">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
            2
          </span>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) -->
<div class="md:hidden hidden bg-white w-full py-2 px-4 shadow-md" id="mobile-menu">
    <div class="flex flex-col space-y-3">
        <a href="{{route('home')}}" class="text-black hover:text-emerald-600 font-medium py-2">Home</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">About</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">Services</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">Projects</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">News</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">Shop</a>
        <a href="#" class="text-gray-500 hover:text-emerald-600 py-2">Contact</a>
    </div>
</div>

@yield('body')


<!-- Footer -->
<footer class="bg-primary-dark text-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">Agricultural Expert System</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white/80 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-white/80 hover:text-white">About</a></li>
                    <li><a href="#" class="text-white/80 hover:text-white">Services</a></li>
                    <li><a href="#" class="text-white/80 hover:text-white">Projects</a></li>
                </ul>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white/80 hover:text-white">News</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white">Shop</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white/80 hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript for Mobile Menu Toggle -->
<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>
