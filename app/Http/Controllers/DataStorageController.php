<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataStorageController extends Controller
{
    public function index()
    {
        return view('frontend.data-storage.index');
    }

}
