<?php

use App\Livewire\Users\CreateUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('admin user can access create-user page', function () {
    $admin = User::factory()->asAdmin()->create();

    $response = $this->actingAs($admin)->get('/create-user');    
    $response->assertStatus(200);
});

test('Manager can access create-user page', function () {
    $manager = User::factory()->asManager()->create();

    $response = $this->actingAs($manager)->get('/create-user');
    $response->assertStatus(200);
});

test('user user can not access create-user page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/create-user');    
    $response->assertStatus(403);
});

test('admin user can create new users', function () {
    $admin = User::factory()->asAdmin()->create();

    $response = Livewire::actingAs($admin)
        ->test(CreateUser::class)
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->set('role', 2)
        ->call('create_user')
        ->assertDispatched('user-created');

    
        $this->assertDatabaseHas('users',[
            'email' => 'test@example.com',
        ]);
        
        $response
        ->assertHasNoErrors();

});


test('manager user can create new users', function () {
    $manager = User::factory()->asManager()->create();

    $response = Livewire::actingAs($manager)
        ->test(CreateUser::class)
        ->set('name', 'Kathy')
        ->set('email', 'kathy@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->set('role', 2)
        ->call('create_user')
        ->assertDispatched('user-created');
    
        $this->assertDatabaseHas('users',[
            'email' => 'kathy@example.com',
        ]);
        
        $response
        ->assertHasNoErrors();

});


test('user can not create new users', function () {
    $user = User::factory()->create();
    
    $response = Livewire::actingAs($user)
        ->test(CreateUser::class)
        ->set('name', 'Maddy')
        ->set('email', 'maddy@example.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->set('role', 2)
        ->call('create_user');       

    
        $this->assertDatabaseMissing('users',[
            'email' => 'maddy@example.com',
        ]);
        
        $response
        ->assertStatus(403);

});




