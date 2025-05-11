<?php

use App\Livewire\Users\UpdateUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('Page contains the user-update component when the URL is visited by admin', function () {
    $admin = User::factory()->asAdmin()->create();
    $id = $admin->id;    

    $response = $this->actingAs($admin)->get(route('users.update', ['user' => $id]));    
    $response->assertStatus(200);
    $response->assertSeeLivewire(UpdateUser::class); # Livewire smoke test
});

test('Page contains the user-update component when the URL is visited by manager', function () {
    $manager = User::factory()->asManager()->create();
    $id = $manager->id;    

    $response = $this->actingAs($manager)->get(route('users.update', ['user' => $id]));    
    $response->assertStatus(200);
    $response->assertSeeLivewire(UpdateUser::class); # Livewire smoke test
});

test('Users can not see update user component when the URL is visited by user', function () {
    $user = User::factory()->create();
    $id = $user->id;    

    $response = $this->actingAs($user)->get(route('users.update', ['user' => $id]));    
    $response->assertStatus(403);    
});

test('admin user can update users', function () {
    $admin = User::factory()->asAdmin()->create();
    $user = User::factory()->create();    

    Livewire::actingAs($admin)
        ->test(UpdateUser::class, ['user' => $user])
        ->set('name', 'Taylor')        
        ->call('update_user')        
        ->assertDispatched('user-updated')         
        ->assertHasNoErrors();

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Taylor',
    ]);
    
});

test('manager user can update users', function () {
    $manager = User::factory()->asManager()->create();
    $user = User::factory()->create();    

    Livewire::actingAs($manager)
        ->test(UpdateUser::class, ['user' => $user])
        ->set('name', 'Bryan')        
        ->call('update_user')        
        ->assertDispatched('user-updated')         
        ->assertHasNoErrors();

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Bryan',
    ]);
    
});

test('users can not update users', function () {
    
    $user = User::factory()->create();    

    Livewire::actingAs($user)
        ->test(UpdateUser::class, ['user' => $user])
        ->set('name', 'Lara')        
        ->call('update_user')
        ->assertForbidden();   

    $this->assertDatabaseMissing('users', [
        'id' => $user->id,
        'name' => 'Lara',
    ]);
    
});

