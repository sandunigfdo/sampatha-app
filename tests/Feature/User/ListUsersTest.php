<?php

use App\Livewire\Users\ListUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('Page contains the user-list component when the URL is visited by admin', function () {
    $admin = User::factory()->asAdmin()->create();

    $response = $this->actingAs($admin)->get('/list-users');    
    $response->assertStatus(200);
    $response->assertSeeLivewire(ListUsers::class); # Livewire smoke test
});

test('Page contains the user-list component when the URL is visited by manager', function () {
    $manager = User::factory()->asManager()->create();

    $response = $this->actingAs($manager)->get('/list-users');    
    $response->assertStatus(200);
    $response->assertSeeLivewire(ListUsers::class); # Livewire smoke test
});

test('Users can not see user-list component when the URL is visited by user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/list-users');    
    $response->assertStatus(403);
    
});

test('All users in the DB is rendered and can see by the admin user', function () {
    $admin = User::factory()->asAdmin()->create();

    User::factory()->count(2)->create();

    Livewire::actingAs($admin)
        ->test(ListUsers::class)
        ->assertHasNoErrors()        
        ->assertViewHas('users', function ($users) {            
            return count($users) === 3;
        });
});

test('All users in the DB is rendered and can see by the manager user', function () {
    $manager = User::factory()->asManager()->create();

    User::factory()->count(2)->create();

    Livewire::actingAs($manager)
        ->test(ListUsers::class)
        ->assertHasNoErrors()        
        ->assertViewHas('users', function ($users) {            
            return count($users) === 3;
        });
});

test('Users can not see user details', function () {
    $user = User::factory()->create();

    User::factory()->count(2)->create();

    Livewire::actingAs($user)
        ->test(ListUsers::class)
        ->assertForbidden()
        ->assertDontSee($user->name);

    
});