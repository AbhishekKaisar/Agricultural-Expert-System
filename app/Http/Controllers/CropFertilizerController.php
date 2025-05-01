<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropFertilizerController extends Controller
{
    public function index()
    {
        return view('frontend.crop-fertilizer.index');
    }
}
