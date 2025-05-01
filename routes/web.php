<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeatherUpdateController;
use App\Http\Controllers\IrrigationGuidanceController;
use App\Http\Controllers\SoilDataAnalysisController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CropFertilizerController;
use App\Http\Controllers\DataStorageController;


Route::get('/', [DashboardController::class, 'index'])->name('home');

//Route::get('/login', [AuthController::class, 'login'])->name('login');
//Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/weather-update', [WeatherUpdateController::class, 'index'])->name('weather-update');

Route::get('/irrigation-guidance', [IrrigationGuidanceController::class, 'index'])->name('irrigation-guidance');

Route::get('/soil-data-analysis', [SoilDataAnalysisController::class, 'index'])->name('soil-data-analysis');
Route::get('/soil-data-recommendation', [SoilDataAnalysisController::class, 'detail'])->name('soil-data-recommendation');

Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');

Route::get('/crop-fertilizer', [CropFertilizerController::class, 'index'])->name('crop-fertilizer');

Route::get('/data-storage', [DataStorageController::class, 'index'])->name('data-storage');

Route::post('/save-weather', [WeatherUpdateController::class, 'save'])->name('save-weather');

Route::post('/soil-data-analysis', [SoilDataAnalysisController::class, 'store'])->name('soil-data-analysis.store');

// Show Recommendation After Submit
Route::get('/soil-data-recommendation', [SoilDataAnalysisController::class, 'detail'])->name('soil-data-recommendation');

Route::get('/crop-fertilizer', [App\Http\Controllers\SoilDataAnalysisController::class, 'cropFertilizer'])->name('crop-fertilizer');

Route::get('/irrigation-guidance', [SoilDataAnalysisController::class, 'irrigationGuidance'])->name('irrigation-guidance');

Route::get('/data-storage', [App\Http\Controllers\SoilDataAnalysisController::class, 'showSoilData'])->name('data.storage');

Route::get('/data-storage', [SoilDataAnalysisController::class, 'showSoilData'])->name('data-storage');

Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
