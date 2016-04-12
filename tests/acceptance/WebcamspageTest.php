<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WebcamspageTest extends TestCase
{

    /** @test */
    public function it_loads()
    {
        $this->visit('webcams')
            ->seeStatusCode(200)
        ;
    }
}
