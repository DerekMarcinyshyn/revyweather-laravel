<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimelapsepageTest extends TestCase
{

    /** @test */
    public function it_loads()
    {
        $this->visit('timelapse')
            ->seeStatusCode(200)
        ;
    }
}
