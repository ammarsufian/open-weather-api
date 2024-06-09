<?php

namespace App\Http\Controllers;

use App\Events\WriteUserLogsEvent;
use App\Http\Resources\WeatherDataResource;
use App\Http\Services\OpenWeatherApiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class WeatherController
{

    public function __invoke(Request $request, OpenWeatherApiService $openWeatherApiService)
    {
        try {
//            event(new WriteUserLogsEvent(auth()->user()->id,'list weathers'));
            return WeatherDataResource::make($openWeatherApiService->getCityWeather($request->all()));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            throw new Exception('Something went wrong, please try again later.', Response::HTTP_BAD_REQUEST);
        }

    }
}
