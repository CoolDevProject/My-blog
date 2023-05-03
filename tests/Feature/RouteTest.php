<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    public function testAccessAdminWithGuestRole(){
        $response = $this->get('/admin/article');
        $response->assertRedirect('/login');
    }
    public function testAccessAdminWithAdminRole(){
        $admin = User::create([
            "email" => 'admin@admin.com',
            "name" => "admin",
            "password" => Hash::make('teeeeest'),
            "role" => User::ADMIN_ROLE
        ]);
        $this->actingAs($admin);
        $response = $this->get('/admin/article');
        
        $response->assertStatus(200);
    }
}
