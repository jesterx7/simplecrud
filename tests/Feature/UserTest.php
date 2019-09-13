<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function login_redirect_test()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function check_login_test()
    {
        $response = $this->get('/login')
        ->assertStatus(200);
    }

    /** @test */
    public function signup_test()
    {
        $response = $this->post('/signup', [
            'name' => 'Marcell',
            'username' => 'mar',
            'email' => 'marni@ymail.com',
            'phone' => '08197627262',
            'address' => 'Jl Blimbing no 2',
            'level' => 'Admin',
            'password' => '123456',
            'conf_password' => '123456'
        ]);

        $response->assertRedirect('/login');
    }

    /** @test */
    public function login_attempt_test()
    {
        $response = $this->post('/login', [
            'username' => 'mar',
            'password' => '123456'
        ]);

        $response->assertRedirect('/');
    }

    /** @test */
    public function add_account_test()
    {
        $response = $this->post('/add_account', [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '08272910292',
            'address' => 'Jl Mawar no 1',
            'level' => 'Admin',
            'password' => '1234567',
            'conf_password' => '1234567'
        ]);

        $response->assertRedirect('/add_account');
    }

    /** @test */
    public function add_data_test() 
    {
        $response = $this->post('add_data', [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'dob' => '09/13/1997',
            'phone' => '085123128991',
            'gender' => 'Male',
            'image' => ''
        ]);

        $response->assertRedirect('/add_data');
    }

    /** @test */
    public function check_list_data() 
    {
        $response = $this->get('/list_data');
        $response->assertStatus(200);
    }

    /** @test */
    public function logout_test() 
    {
        $response = $this->get('/logout');
        $response->assertRedirect('/login');
    }
}
