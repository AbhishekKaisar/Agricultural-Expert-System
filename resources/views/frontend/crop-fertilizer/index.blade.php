@extends('frontend.master')

@section('title','Crop Fertilizer')

@section('body')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4a7c7c',
                        'primary-dark': '#3a6060',
                        'primary-light': '#5a8c8c',
                        'secondary': '#e6c34a',
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
        }
        .btn-gradient {
            background: linear-gradient(to right, #3a6060, #4a7c7c);
        }
    </style>

    <!-- Hero Banner -->
    <section class="bg-primary-light relative overflow-hidden">
        <div class="container mx-auto px-4 py-20 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center">Crop And Fertilizer</h1>
        </div>
    </section>

    <!-- AI Based Recommendation Section -->
    <section class="py-12 px-4 md:px-8 max-w-7xl mx-auto">
        <div class="flex items-center mb-10">
            <div class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 7L9 19l-5.5-5.5 1.41-1.41L9 16.17l10.59-10.59L21 7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-primary-dark">AI Based Recommendation</h2>
        </div>

        <!-- Crop Section -->
        <div class="mb-12">
            <h3 class="text-2xl font-medium text-gray-700 mb-6">Crop</h3>
            <div class="flex flex-wrap gap-6">
                @if(isset($crops) && count($crops) > 0)
                    @foreach($crops as $crop)
                        <button class="btn-gradient text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            {{ $crop }}
                        </button>
                    @endforeach
                @else
                    <p>No crops recommended.</p>
                @endif
            </div>
        </div>

        <!-- Fertilizer Section -->
        <div>
            <h3 class="text-2xl font-medium text-gray-700 mb-6">Fertilizer</h3>
            <div class="flex flex-wrap gap-6">
                @if(isset($fertilizers) && count($fertilizers) > 0)
                    @foreach($fertilizers as $fertilizer)
                        <button class="btn-gradient text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            {{ $fertilizer }}
                        </button>
                    @endforeach
                @else
                    <p>No fertilizers recommended.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
