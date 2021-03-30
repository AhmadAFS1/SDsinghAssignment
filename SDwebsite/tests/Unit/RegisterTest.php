<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    //use RefreshDatabase;
    public function test_if_user_can_register()
    {
        /**
         * Test Auth user profile data
         *
         * @return void
         */

        $this->assertTrue(True);


        $response = $this->get('/home')->assertStatus(302);

        
    }
}
