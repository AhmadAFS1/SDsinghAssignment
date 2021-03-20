<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_database_as_user()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(302);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>'abc', 
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(500);
    }
    public function test_database_as_guest()
    {
        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(500);
    }

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

    public function test_register_with_existed_email()
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
        ]);

        $response = $this->post('/register', [
            'name' => 'asdasd',
            'email' => 'asdasd@asd',
            'password' => 'testpass',
            'password_confirmation' => 'testpass',
        ]);
        $isExist = User::select('*')
        ->where('name', 'asdasd')
        ->exists();
        if($isExist)
        $response = $this->assertTrue(False);
        else
        $response = $this->assertTrue(True);
    }
}
