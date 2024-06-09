<?php


use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'weather'], function () {
    Route::get('/{city}', WeatherController::class);
});
