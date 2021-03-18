<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefereshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_form()
    {
        $response = $this   
        ->visit('/fuelquoteform')
        ->type('abc', 'Gallons');
        $response->assertStatus(200);
    }

    public function test_database()
    {
        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 
                                                            'Address'=>"100 Willows St",
                                                            'start'=>"2021-10-10",
                                                            'Suggested_Price'=>120,
                                                            'Due'=>115]);
        $response
        ->assertStatus(201)
        ->assertJson(['created'=>true]);
    }
}
