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

    public function getCityWeather(array $data)
    {
        $response = $this->client->get('weather', [
            'query' => [
                'q' => data_get($data,'city'),
                'lat'=> data_get($data,'lat'),
                'lon' =>data_get($data,'lon'),
                'appid' => config('services.openWeatherMap.api_key'),
            ]
        ]);

        $weatherData = json_decode($response->getBody(), true);

        WeatherData::updateOrCreate(['city' =>  data_get($data,'city')], [
            'data' => $response->getBody(),
        ]);

        return $weatherData;
    }
}
