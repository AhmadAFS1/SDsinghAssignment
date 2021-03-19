<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_database()
    {
        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(302);
        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>'abc', 
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(500);
    }
}
