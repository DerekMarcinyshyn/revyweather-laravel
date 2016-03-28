<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeatherGetEnvironmentCanadaTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Services\Weather\GetEnvironmentCanada::class,
            new RevyWeather\Services\Weather\GetEnvironmentCanada);
    }
}
