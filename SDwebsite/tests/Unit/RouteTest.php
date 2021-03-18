<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefereshDatabase;

class SDwebsiteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200); 
        $response = $this->get('/fuelquoteform');
        $response->assertStatus(200); 
        $response = $this->get('/fuelquotehistory');
        $response->assertStatus(200);
        $response = $this->get('/home');
        $response->assertStatus(302);
        $response = $this->get('/profile');
        $response->assertStatus(500);
    }
}
