<?php

namespace Tests\Traits;

trait WithApi
{

    public function getCityWeather(array $attributes)
    {
        $response = $this->get('/api/weather?' . http_build_query($attributes));

        return $response;
    }
}
