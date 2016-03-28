<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocalTest extends TestCase
{

    /** @test */
    public function it_initializes()
    {
        $this->assertInstanceOf(RevyWeather\Console\Commands\LocalCommand::class,
            new RevyWeather\Console\Commands\LocalCommand());
    }
}
