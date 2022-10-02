<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilmsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/films');
        $response->assertStatus(200);
        $response->assertSee('Films list');
        $response->assertDontSee('Film create');
    }
}
