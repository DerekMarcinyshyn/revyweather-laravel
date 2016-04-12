<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use RevyWeather\Services\Weather\GetLocalHistory;
use RevyWeather\Services\Log\Daily;
use RevyWeather\Local;

class HttpControllersHistoryControllerTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $local = new Local();
        $getLocalHistory = new GetLocalHistory($local);
        $daily = new Daily();
        
        $this->assertInstanceOf(RevyWeather\Http\Controllers\HistoryController::class,
            new RevyWeather\Http\Controllers\HistoryController($getLocalHistory, $daily));
    }

}
