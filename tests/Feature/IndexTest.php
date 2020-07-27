<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * @test
     */
    public function testHomePageSuccess()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    /**
     * @test
     */
    public function testHomePageWrongMethod()
    {
        $response = $this->post('/');

        $response->assertStatus(405);
    }
}
