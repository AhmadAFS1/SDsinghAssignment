<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class RegisterTest extends TestCase
{
    use RefreshDatabase;
    public function test_if_user_can_register()
    {
        /**
         * Test Auth user profile data
         *
         * @return void
         */
        $response = $this->post('/register', [
            'name' => 'asd',
            'email' => 'asdasd@asd',
            'password' => 'testpass',
            'password_confirmation' => 'testpass',
        ])
        ->assertRedirect('/home');

        $response = $this->assertDatabaseHas('users', ['name' => 'asd']);
    }
}
