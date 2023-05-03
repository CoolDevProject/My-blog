<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    public function testValidRegistration(){
        $fake = Factory::create();
        $email = $fake->unique()->email;
        $count = User::count();

        $response = $this->post('/register', [
            'name' => "test",
            'email' => $email,
            "password" => "password",
            "password_confirmation" => "password",
        ]);

        $newCount = User::count();

        $this->assertNotEquals($count, $newCount);
    }
    public function testInvalidRegistration(){

        $response = $this->post('/register', [
            'name' => "test",
            'email' => "",
            "password" => "password",
            "password_confirmation" => "password",
        ]);

        $response->assertSessionHasErrors();
    }
}
