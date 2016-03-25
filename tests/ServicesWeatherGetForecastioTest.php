<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Services\Weather\GetForecastio;

class ServicesWeatherGetForecastioTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Services\Weather\GetForecastio::class,
            new RevyWeather\Services\Weather\GetForecastio);
    }

    /** @test */
    public function it_has_an_attribute_called_key()
    {
        $this->assertClassHasAttribute('key', 'RevyWeather\Services\Weather\GetForecastio');
    }
}
