<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoilDataAnalysis;
use App\Models\WeatherData;
use OpenAI\Laravel\Facades\OpenAI; // ✅ Already correctly added

class SoilDataAnalysisController extends Controller
{
    // ✅ Show the Soil Data Input Form
    public function index()
    {
        return view('frontend.soil-data-analysis.index');
    }

    // ✅ Save the Soil Data from Form
    public function store(Request $request)
    {
        $data = $request->validate([
            'water_level' => 'required|string',
            'ph_level' => 'required|string',
            'nitrogen_level' => 'required|string',
            'days_after_irrigation' => 'required|string',
            'potassium_level' => 'required|string',
            'ph_level_2' => 'required|string',
        ]);

        SoilDataAnalysis::create($data);

        return redirect()->route('soil-data-recommendation')->with('success', 'Soil data saved successfully!');
    }

    // ✅ Show the Recommendation Page after Submit
    public function detail()
    {
        $latestSoilData = SoilDataAnalysis::latest()->first();

        $recommendation = null;
        if ($latestSoilData) {
            $recommendation = $this->generateRecommendation($latestSoilData);
        }

        return view('frontend.soil-data-analysis.detailed-recommendation', compact('recommendation'));
    }

    // ✅ Generate Irrigation & Soil Improvement Recommendation using OpenAI
    public function generateRecommendation($soilData)
    {
        $prompt = "Here is the soil data:
Water Level: {$soilData->water_level},
pH Level: {$soilData->ph_level},
Nitrogen Level: {$soilData->nitrogen_level},
Days After Irrigation: {$soilData->days_after_irrigation},
Potassium Level: {$soilData->potassium_level},
pH Level 2: {$soilData->ph_level_2}.

Based on this data, provide a detailed farming irrigation and soil improvement recommendation.";

        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return $response->choices[0]->message->content;
    }

    // ✅ NEW: Show Crop & Fertilizer Recommendation Page
    public function cropFertilizer()
    {
        $soilData = SoilDataAnalysis::latest()->first();

        $recommendation = null;
        if ($soilData) {
            $prompt = "Here is the soil data:
Water Level: {$soilData->water_level},
pH Level: {$soilData->ph_level},
Nitrogen Level: {$soilData->nitrogen_level},
Days After Irrigation: {$soilData->days_after_irrigation},
Potassium Level: {$soilData->potassium_level},
pH Level 2: {$soilData->ph_level_2}.

Now based on this data:

- Recommend 3 best crops
- Recommend 3 best fertilizers

Write the output STRICTLY in this format only:

Crops Recommended: Crop1, Crop2, Crop3
Fertilizers Recommended: Fertilizer1, Fertilizer2, Fertilizer3

Don't write anything else except this format.";

            $response = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $recommendation = $response->choices[0]->message->content;
        }

        $crops = [];
        $fertilizers = [];

        // ✅ Extract crops and fertilizers cleanly
        if ($recommendation) {
            preg_match('/Crops Recommended:(.*)Fertilizers Recommended:/s', $recommendation, $cropMatch);
            preg_match('/Fertilizers Recommended:(.*)$/s', $recommendation, $fertilizerMatch);

            if (isset($cropMatch[1])) {
                $crops = array_map('trim', explode(',', $cropMatch[1]));
            }

            if (isset($fertilizerMatch[1])) {
                $fertilizers = array_map('trim', explode(',', $fertilizerMatch[1]));
            }
        }

        return view('frontend.crop-fertilizer.index', compact('crops', 'fertilizers'));
    }

    // ✅ NEW: Show Irrigation Guidance based on Weather Data
    public function irrigationGuidance()
    {
        $weatherData = WeatherData::where('is_today', 1)->latest()->first();

        $recommendation = null;
        if ($weatherData) {
            $prompt = "Here is today's weather data:
City: {$weatherData->city},
Country: {$weatherData->country},
Day: {$weatherData->day},
Temperature: {$weatherData->temperature_celsius}°C,
Weather Condition: {$weatherData->weather_type}.

Based on this weather data, provide detailed irrigation guidance for farmers. Should irrigation be applied or delayed? Mention reasons based on temperature, rainfall chances, or soil moisture conservation techniques.";

            $response = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $recommendation = $response->choices[0]->message->content;
        }

        return view('frontend.irrigation-guidance.index', compact('recommendation'));
    }
    public function showSoilData()
    {
        $soilData = \App\Models\SoilDataAnalysis::latest()->get();
        return view('frontend.data-storage.index', compact('soilData'));
    }

}
