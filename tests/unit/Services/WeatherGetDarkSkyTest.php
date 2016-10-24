<?php

use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Services\Log\Daily;
use RevyWeather\Services\Weather\GetDarkSky;

class WeatherGetDarkSkyTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Services\Weather\GetDarkSky::class,
            new RevyWeather\Services\Weather\GetDarkSky(new Client(), new Daily()));
    }

    /** @test */
    public function it_has_an_attribute_called_apiSecretKey()
    {
        $this->assertClassHasAttribute('apiSecretKey', 'RevyWeather\Services\Weather\GetDarkSky');
    }

    /** @test */
    public function it_has_an_attribute_called_client()
    {
        $this->assertClassHasAttribute('client', 'RevyWeather\Services\Weather\GetDarkSky');
    }

    /** @test */
    public function it_has_an_attribute_called_daily()
    {
        $this->assertClassHasAttribute('daily', 'RevyWeather\Services\Weather\GetDarkSky');
    }
}
