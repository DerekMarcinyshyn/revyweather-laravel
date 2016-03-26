<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Services\Weather\GetForecastio;

class ServicesWeatherGetLocalTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Services\Weather\GetLocal::class,
            new RevyWeather\Services\Weather\GetLocal());
    }

    /** @test */
    public function it_has_an_attribute_called_url()
    {
        $this->assertClassHasAttribute('url', 'RevyWeather\Services\Weather\GetLocal');
    }
}
