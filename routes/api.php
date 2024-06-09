<?php


use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\RateLimiterMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('auth/login',[AuthenticateController::class,'login']);
Route::post('auth/register',[AuthenticateController::class,'register']);
Route::group(['middleware'=> RateLimiterMiddleware::class,'prefix' => 'weather'], function () {
    Route::get('/', WeatherController::class);
});
