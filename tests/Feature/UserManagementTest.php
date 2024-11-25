<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_creation()
    {


        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'national_code' => rand(12,12),
            'cellphone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'password' => fake()->password(8,12),
        ]);

        $this->assertDatabaseHas('users', $user->toArray());
    }
}
