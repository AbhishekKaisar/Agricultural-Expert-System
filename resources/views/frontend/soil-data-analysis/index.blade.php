@extends('frontend.master')

@section('title','Soil Data Analysis')

@section('body')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#5DA58B',
                        'primary-dark': '#4B7462',
                        'option-bg': '#FFDAD9',
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
            background-color: #ffffff;
        }
        .option-radio {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        .option-radio:checked + .option-label {
            background-color: #4B7462;
        }
        .option-radio:checked + .option-label span:not(.option-letter) {
            color: white;
        }
        .option-radio:focus + .option-label {
            outline: 2px solid #4B7462;
            outline-offset: 2px;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 h-full flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold text-white text-center">AgriSense: Smart Farming Starts with Your Soil</h1>
            <div class="text-white text-sm mb-2">
                <p>Empowering Farmers Through Smart Agriculture</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="max-w-7xl mx-auto px-4 py-16">
        <form id="soilDataForm" action="{{ route('soil-data-analysis.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16">
                <!-- Question 1 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">What is the Current Water Level?</h2>
                    <div class="space-y-3">
                        @foreach (['0-25', '26-50', '51-75', '76-100'] as $level)
                            <div>
                                <input type="radio" id="water-{{ $level }}" name="water_level" value="{{ $level }}" class="option-radio" {{ $loop->first ? 'checked' : '' }}>
                                <label for="water-{{ $level }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $level }}%</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Question 2 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">What is the Current pH Level?</h2>
                    <div class="space-y-3">
                        @foreach (['0-3', '4-7', '8-11', '12-14'] as $ph)
                            <div>
                                <input type="radio" id="ph-{{ $ph }}" name="ph_level" value="{{ $ph }}" class="option-radio" {{ $loop->first ? '' : ($loop->iteration == 2 ? 'checked' : '') }}>
                                <label for="ph-{{ $ph }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $ph }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Question 3 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">What is the Current Nitrogen Level?</h2>
                    <div class="space-y-3">
                        @foreach (['0-25', '26-50', '51-75', '76-100'] as $nitrogen)
                            <div>
                                <input type="radio" id="nitrogen-{{ $nitrogen }}" name="nitrogen_level" value="{{ $nitrogen }}" class="option-radio" {{ $loop->first ? '' : ($loop->iteration == 2 ? 'checked' : '') }}>
                                <label for="nitrogen-{{ $nitrogen }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $nitrogen }}%</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Question 4 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">How many days passed after irrigation?</h2>
                    <div class="space-y-3">
                        @foreach (['0-3', '4-7', '8-11', '12-14'] as $days)
                            <div>
                                <input type="radio" id="days-{{ $days }}" name="days_after_irrigation" value="{{ $days }}" class="option-radio" {{ $loop->first ? '' : ($loop->iteration == 2 ? 'checked' : '') }}>
                                <label for="days-{{ $days }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $days }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Question 5 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">What is the Current Potassium Level?</h2>
                    <div class="space-y-3">
                        @foreach (['0-25', '26-50', '51-75', '76-100'] as $potassium)
                            <div>
                                <input type="radio" id="potassium-{{ $potassium }}" name="potassium_level" value="{{ $potassium }}" class="option-radio" {{ $loop->first ? '' : ($loop->iteration == 2 ? 'checked' : '') }}>
                                <label for="potassium-{{ $potassium }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $potassium }}%</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Question 6 -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">What is the Current pH Level?</h2>
                    <div class="space-y-3">
                        @foreach (['0-3', '4-7', '8-11', '12-14'] as $ph2)
                            <div>
                                <input type="radio" id="ph2-{{ $ph2 }}" name="ph_level_2" value="{{ $ph2 }}" class="option-radio" {{ $loop->first ? '' : ($loop->iteration == 2 ? 'checked' : '') }}>
                                <label for="ph2-{{ $ph2 }}" class="option-label bg-option-bg rounded-lg shadow-sm p-4 flex items-center cursor-pointer">
                                    <div class="w-8 h-8 rounded-full bg-red-300 flex items-center justify-center mr-4">
                                        <span class="font-medium text-red-700 option-letter">{{ chr(65 + $loop->index) }}</span>
                                    </div>
                                    <span>{{ $ph2 }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-16">
                <button type="submit" class="bg-primary-dark hover:bg-primary text-white font-medium py-3 px-12 rounded-full shadow-md transition duration-300">
                    Submit Data
                </button>
            </div>
        </form>

        <script>
            document.querySelectorAll('.option-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    const name = this.name;
                    document.querySelectorAll(`input[name="${name}"] + .option-label`).forEach(label => {
                        label.classList.remove('bg-primary-dark');
                        label.classList.add('bg-option-bg');
                        const textSpan = label.querySelector('span:not(.option-letter)');
                        if (textSpan) textSpan.classList.remove('text-white');
                    });

                    if (this.checked) {
                        const label = this.nextElementSibling;
                        label.classList.remove('bg-option-bg');
                        label.classList.add('bg-primary-dark');
                        const textSpan = label.querySelector('span:not(.option-letter)');
                        if (textSpan) textSpan.classList.add('text-white');
                    }
                });
            });
        </script>
    </section>
@endsection
