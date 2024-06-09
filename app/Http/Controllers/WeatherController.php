<?php

namespace App\Http\Controllers;

use App\Http\Services\OpenWeatherApiService;

class WeatherController
{

    public function __invoke(string $city,OpenWeatherApiService $openWeatherApiService)
    {
        return $openWeatherApiService->getCityWeather($city);
    }
}
