<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoilDataAnalysis extends Model
{
    use HasFactory;

    // Tell Laravel to use the correct table name
    protected $table = 'soil_data_analysis';

    // Allow mass assignment for these fields
    protected $fillable = [
        'water_level',
        'ph_level',
        'nitrogen_level',
        'days_after_irrigation',
        'potassium_level',
        'ph_level_2',
    ];
}
