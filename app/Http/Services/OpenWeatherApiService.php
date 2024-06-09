<?php

namespace App\Http\Services;

use App\Models\WeatherData;
use GuzzleHttp\Client;

class OpenWeatherApiService
{

    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/',
        ]);
    }

    public function getCityWeather($city)
    {
       $response = $this->client->get('weather', [
            'query' => [
                'q' => $city,
                'appid' => config('services.openWeatherMap.api_key'),
            ]
        ]);
        $weatherData = json_decode($response->getBody(), true);
        // Store the weather data in the database
        WeatherData::updateOrCreate(['city'=> $city],[
            'data' => $weatherData,
        ]);

        return $weatherData;
    }
}
