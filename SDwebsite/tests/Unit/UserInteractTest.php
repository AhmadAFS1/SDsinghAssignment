<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
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
    }
}
