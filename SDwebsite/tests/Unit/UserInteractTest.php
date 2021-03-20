<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInteractTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_interaction()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user);
        $response = $this->get('/profile');
        $response -> assertStatus(200);



        
        $response = $this -> json('PUT', '/profile', ['name'=>"Larry Test", 'address1'=>"638 Glen Ridge Drive", 
        "city" => "Uniondale", "state"=> "NY", "zipcode" => "11553" ]);
        $response
        ->assertStatus(302);

        $response = $this -> json('PUT', '/profile', ['name'=>"Larry Test", 'address1'=>"638 Glen Ridge Drive", 
        "city" => "Uniondale", "state"=> 430, "zipcode" => "11553" ]);
        $response
        ->assertStatus(302);

        $response = $this -> json('PUT', '/profile', ['name'=>"Larry Test", 'address1'=>"638 Glen Ridge Drive", 
        "city" => 1234, "state"=> "NY", "zipcode" => "11553" ]);
        $response
        ->assertStatus(302);

        $response = $this -> json('PUT', '/profile', ['name'=>55555, 'address1'=>"638 Glen Ridge Drive", 
        "city" => "Uniondale", "state"=> "NY", "zipcode" => "11553" ]);
        $response
        ->assertStatus(500);

        $response = $this -> json('PUT', '/profile', ['name'=>"Larry Test", 'address1'=>52325, 
        "city" => "Uniondale", "state"=> "NY", "zipcode" => "11553" ]);
        $response
        ->assertStatus(500);

        $response = $this -> json('PUT', '/profile', ['name'=>"Larry Test", 'address1'=>52325, 
        "city" => "Uniondale", "state"=> "NY", "zipcode" => 12345 ]);
        $response
        ->assertStatus(500);
    }
}
