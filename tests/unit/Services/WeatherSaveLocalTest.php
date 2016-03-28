<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Local;

class WeatherSaveLocalTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $local = new Local();
        $this->assertInstanceOf(RevyWeather\Services\Weather\SaveLocal::class,
            new RevyWeather\Services\Weather\SaveLocal($local));
    }

    /** @test */
    public function it_has_an_attribute_called_url()
    {
        $this->assertClassHasAttribute('url', 'RevyWeather\Services\Weather\SaveLocal');
    }

    /** @test */
    public function it_has_an_attribute_called_local()
    {
        $this->assertClassHasAttribute('local', 'RevyWeather\Services\Weather\SaveLocal');
    }
}
