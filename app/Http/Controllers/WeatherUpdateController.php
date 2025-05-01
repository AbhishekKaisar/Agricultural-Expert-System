<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherData; // ✅ Add this line to use the model

class WeatherUpdateController extends Controller
{
    public function index()
    {
        return view('frontend.weather-update.index');
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'city' => 'required|string',
            'country' => 'required|string',
            'day' => 'required|string',
            'temperature_celsius' => 'required|numeric',
            'temperature_fahrenheit' => 'required|numeric',
            'weather_type' => 'required|string',
            'icon_code' => 'required|string',
            'is_today' => 'required|boolean',
        ]);

        WeatherData::create($data);

        return response()->json(['message' => 'Weather data saved successfully']);
    }
}
