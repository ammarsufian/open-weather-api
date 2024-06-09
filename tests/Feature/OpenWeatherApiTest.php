<?php

namespace Tests\Feature;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class OpenWeatherApiTest extends TestCase
{
    /**
     * @test
     */
    public function should_return_current_weather_status_for_specific_city(): void
    {
        $this->getCityWeather(['city'=>'amman'])
            ->assertOk()
            ->assertJsonCount(1);
    }
    /**
     * @test
     */
    public function cannot_return_weather_when_city_name_is_invalid(): void
    {
        $this->expectException(Exception::class);
        $this->getCityWeather(['city'=>'ammanssss'])
            ->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->expectExceptionMessage('Something went wrong, please try again later.');
    }

    /**
     * @test
     */
    public function should_return_weather_by_lat_and_lon(): void
    {
        $this->getCityWeather(['city'=>'amman','lat'=>31.9132721,'lon'=>35.9832721])
            ->assertOk();
    }
}
