@extends('frontend.master')

@section('title','User Management')

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
        .farm-bg {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%234a7c7c"/></svg>');
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            font-weight: 600;
            text-transform: capitalize;
        }
        tr:hover {
            background-color: #f8fafc;
        }
    </style>

    <!-- Hero Banner -->
    <section class="bg-primary-light relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="h-full w-full relative">
                <div class="absolute bottom-0 w-full">
                    <svg viewBox="0 0 1200 200" class="w-full">
                        <path d="M0 200 L200 120 L400 160 L600 100 L800 140 L1000 80 L1200 160 L1200 200 Z" fill="#3a6060" />
                    </svg>
                </div>
                <div class="absolute bottom-0 w-full flex justify-around">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="relative">
                            <svg width="40" height="80" viewBox="0 0 40 80" class="text-green-300">
                                <path d="M20 80 L20 40" stroke="#2d4a4a" stroke-width="2" />
                                <path d="M20 40 C10 30, 0 35, 5 20" stroke="#a3e635" stroke-width="2" fill="none" />
                                <path d="M20 40 C30 30, 40 35, 35 20" stroke="#a3e635" stroke-width="2" fill="none" />
                                <path d="M20 30 C10 20, 0 25, 5 10" stroke="#a3e635" stroke-width="2" fill="none" />
                                <path d="M20 30 C30 20, 40 25, 35 10" stroke="#a3e635" stroke-width="2" fill="none" />
                            </svg>
                        </div>
                    @endfor
                </div>

                <div class="absolute bottom-0 w-full">
                    <div class="absolute left-1/4 bottom-0">
                        <svg width="40" height="60" viewBox="0 0 40 60">
                            <rect x="15" y="40" width="10" height="20" fill="#e2e8f0" />
                            <rect x="10" y="30" width="20" height="10" fill="#e2e8f0" />
                            <path d="M10 30 C0 10, 5 5, 0 0" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M15 30 C10 5, 15 0, 20 -10" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M25 30 C30 5, 25 0, 20 -10" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M30 30 C40 10, 35 5, 40 0" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                        </svg>
                    </div>
                    <div class="absolute right-1/4 bottom-0">
                        <svg width="40" height="60" viewBox="0 0 40 60">
                            <rect x="15" y="40" width="10" height="20" fill="#e2e8f0" />
                            <rect x="10" y="30" width="20" height="10" fill="#e2e8f0" />
                            <path d="M10 30 C0 10, 5 5, 0 0" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M15 30 C10 5, 15 0, 20 -10" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M25 30 C30 5, 25 0, 20 -10" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                            <path d="M30 30 C40 10, 35 5, 40 0" stroke="#a5f3fc" stroke-width="2" stroke-dasharray="5,5" fill="none" />
                        </svg>
                    </div>
                </div>

                <div class="absolute top-10 right-10">
                    <svg width="60" height="60" viewBox="0 0 60 60">
                        <circle cx="30" cy="30" r="15" fill="#fef3c7" />
                        <line x1="30" y1="5" x2="30" y2="15" stroke="#fef3c7" stroke-width="2" />
                        <line x1="30" y1="45" x2="30" y2="55" stroke="#fef3c7" stroke-width="2" />
                        <line x1="5" y1="30" x2="15" y2="30" stroke="#fef3c7" stroke-width="2" />
                        <line x1="45" y1="30" x2="55" y2="30" stroke="#fef3c7" stroke-width="2" />
                        <line x1="12" y1="12" x2="19" y2="19" stroke="#fef3c7" stroke-width="2" />
                        <line x1="41" y1="41" x2="48" y2="48" stroke="#fef3c7" stroke-width="2" />
                        <line x1="12" y1="48" x2="19" y2="41" stroke="#fef3c7" stroke-width="2" />
                        <line x1="41" y1="19" x2="48" y2="12" stroke="#fef3c7" stroke-width="2" />
                    </svg>
                </div>

                <div class="absolute bottom-0 w-full h-16 bg-amber-200">
                    <svg width="100%" height="100%" viewBox="0 0 100 20">
                        <path d="M0 10 Q 5 5, 10 10 T 20 10 T 30 10 T 40 10 T 50 10 T 60 10 T 70 10 T 80 10 T 90 10 T 100 10 V 20 H 0 Z" fill="#d4a76a" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center">User Management</h1>
        </div>
    </section>

    <!-- Table Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-8">User Table</h2>

            <div class="table-container bg-white rounded-lg shadow-md">
                <table class="min-w-full">
                    <thead>
                    <tr class="bg-gray-50">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-6 text-center">{{ $user->id }}</td>
                            <td class="py-4 px-6 text-center">{{ $user->name }}</td>
                            <td class="py-4 px-6 text-center">{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
