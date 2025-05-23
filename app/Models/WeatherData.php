<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'country',
        'day',
        'temperature_celsius',
        'temperature_fahrenheit',
        'weather_type',
        'icon_code',
        'is_today',
    ];
}
