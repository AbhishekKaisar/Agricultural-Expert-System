<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IrrigationGuidanceController extends Controller
{
    public function index()
    {
        return view('frontend.irrigation-guidance.index');
    }
}
