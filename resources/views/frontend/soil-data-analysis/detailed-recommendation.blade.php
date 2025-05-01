@extends('frontend.master')

@section('title','Soil Data Recommendation')

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
    </style>

    <!-- Hero Banner with AI Robot Illustration -->
    <section class="bg-primary-light relative overflow-hidden">
        <div class="h-[300px] w-full relative">
            <!-- Farm Illustration -->
            <svg viewBox="0 0 1200 400" class="w-full h-full">
                <rect width="1200" height="400" fill="#4a7c7c" />
                <path d="M0 300 Q 200 250, 400 300 T 800 300 T 1200 300 V 400 H 0 Z" fill="#3a6060" />
                <path d="M0 350 Q 300 320, 600 350 T 1200 350 V 400 H 0 Z" fill="#2d4a4a" />
                <circle cx="400" cy="100" r="40" fill="#e2e8f0" />
                <path d="M500 100 Q 520 80, 550 90 Q 570 70, 600 80 Q 620 70, 640 90 Q 660 80, 670 100 Q 680 120, 650 130 Q 660 150, 630 160 Q 610 170, 580 160 Q 560 180, 530 170 Q 510 180, 490 160 Q 470 170, 460 150 Q 450 130, 470 120 Q 450 100, 500 100" fill="#e2e8f0" />
            </svg>
        </div>
    </section>

    <!-- AI Based Recommendation Section -->
    <section class="py-12 px-4 md:px-8 max-w-7xl mx-auto">
        <!-- Section Title -->
        <div class="flex justify-center items-center mb-10">
            <div class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 7L9 19l-5.5-5.5 1.41-1.41L9 16.17l10.59-10.59L21 7z"></path>
                </svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-primary-dark">AI Based Recommendation</h2>
        </div>

        <!-- Recommendation Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 flex flex-col md:flex-row items-start gap-6">
            <!-- Left Circle -->
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-primary-dark flex-shrink-0 mx-auto md:mx-0"></div>

            <!-- Right Recommendation Text -->
            <div class="flex-grow">
                @if ($recommendation)
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $recommendation }}
                    </p>
                @else
                    <p class="text-gray-500">
                        No recommendation available. Please submit soil data first!
                    </p>
                @endif
            </div>
        </div>
    </section>
@endsection
