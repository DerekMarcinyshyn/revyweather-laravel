<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AboutpageTest extends TestCase
{

    /** @test */
    public function it_loads()
    {
        $this->visit('about')
            ->seeStatusCode(200)
        ;
    }
}
