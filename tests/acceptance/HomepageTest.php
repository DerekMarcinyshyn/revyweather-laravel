<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{

    /** @test */
    public function it_shows_site_titles()
    {
        $this->visit('/')
            ->see('Courthouse Revelstoke')
            ->see('Downtown Revelstoke')
            ->see('Revelstoke Airport')
        ;
    }
}
