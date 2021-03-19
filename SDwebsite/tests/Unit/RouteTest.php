<?php

namespace Tests\Unit;

use Tests\TestCase;

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
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }
}
