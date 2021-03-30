<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

class ResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //use RefreshDatabase;

    public function test_database_as_user_in_tx()
    {
        $user1 = User::find(1);

        $response = $this->actingAs($user1);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 'Price' => 2,
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(302);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>'abc', 'Price' => 2,
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(500);
    }

    public function test_database_as_user_out_tx()
    {
        $user2 = User::find(2);

        $response = $this->actingAs($user2);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>100, 'Price' => 3,
                                                            'start'=>"2021-10-10"]);
        $response
        ->assertStatus(302);

        $response = $this -> json('POST', '/fuelquoteform', ['Gallons'=>'abc', 'Price' => 3,
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

        $response = $this -> json('POST', '/register', [
            'name' => 'asd',
            'email' => 'asdasd@asd',
            'password' => 'testpass',
            'password_confirmation' => 'testpass'])
            ->assertStatus(201);

        $response = $this->assertDatabaseHas('users', ['name' => 'asd']);
    }

    public function test_register_with_wrong_confirm_password()
    {
        /**
         * Test Auth user profile data
         *
         * @return void
         */

        $response = $this -> json('POST', '/register', [
            'name' => 'asd2',
            'email' => 'asdasd2@asd',
            'password' => 'testpasst',
            'password_confirmation' => 'testpass'])
            ->assertStatus(422);
        $isExist = User::select('*')
        ->where('name', 'asd2')
        ->exists();
        if($isExist)
        $response = $this->assertTrue(False);
        else
        $response = $this->assertTrue(True);
    }

    public function test_register_with_existed_email()
    {
        /**
         * Test Auth user profile data
         *
         * @return void
         */

        $exist_users = DB::table('users')->get();

        if($exist_users == NULL){

            $response = $this -> json('POST', '/register', [
                'name' => 'asd',
                'email' => 'asdasd@asd',
                'password' => 'testpass',
                'password_confirmation' => 'testpass'])
                ->assertStatus(201);
                
            $response = $this->assertDatabaseHas('users', ['name' => 'asd']);
            $user_email = 'asdasd@asd';
        }
        else{
            $user_email = $exist_users[0] -> email;
        }

        $response = $this -> json('POST', '/register', [
            'name' => 'asd2',
            'email' => $user_email,
            'password' => 'testpass',
            'password_confirmation' => 'testpass'])
            ->assertStatus(422);
    }
}
