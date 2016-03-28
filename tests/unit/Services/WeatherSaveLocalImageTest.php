<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Local;

class WeatherSaveLocalImageTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Services\Weather\SaveLocalImage::class,
            new RevyWeather\Services\Weather\SaveLocalImage());
    }

    /** @test */
    public function it_has_an_attribute_called_url()
    {
        $this->assertClassHasAttribute('url', 'RevyWeather\Services\Weather\SaveLocalImage');
    }
}
