@extends('frontend.master')

@section('title','Data Storage')

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
            text-align: center;
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

        <div class="container mx-auto px-4 py-20 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center">Data Storage</h1>
        </div>
    </section>

    <!-- Table Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-8">Table</h2>

            <div class="table-container bg-white rounded-lg shadow-md">
                <table class="min-w-full">
                    <thead>
                    <tr class="bg-gray-50">
                        <th>NO</th>
                        <th>Date</th>
                        <th>Water Level</th>
                        <th>pH Level</th>
                        <th>Nitrogen Level</th>
                        <th>Potassium Level</th>
                        <th>pH Level 2</th>
                        <th>Days After Irrigation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soilData as $index => $data)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-6">{{ $index + 1 }}</td>
                            <td class="py-4 px-6">{{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</td>
                            <td class="py-4 px-6">{{ $data->water_level }}</td>
                            <td class="py-4 px-6">{{ $data->ph_level }}</td>
                            <td class="py-4 px-6">{{ $data->nitrogen_level }}</td>
                            <td class="py-4 px-6">{{ $data->potassium_level }}</td>
                            <td class="py-4 px-6">{{ $data->ph_level_2 }}</td>
                            <td class="py-4 px-6">{{ $data->days_after_irrigation }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
