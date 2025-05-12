<?php

use App\Livewire\Users\ListUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('admin user can delete users', function () {
    $admin = User::factory()->asAdmin()->create();
    $user = User::factory()->create();

    $this->assertEquals(2, User::count());
    
    Livewire::actingAs($admin)
        ->test(ListUsers::class)        
        ->call('delete_user', $user->id)
        ->assertDispatched('user-deleted');

        $this->assertEquals(1, User::count()); 
    
        $this->assertDatabaseMissing('users', [
            'id' => $user->id            
        ]);   
       
});

test('manager user can delete users', function () {
    $manager = User::factory()->asManager()->create();
    $userToDelete = User::factory()->create();
    User::factory()->create();

    $this->assertEquals(3, User::count());
    
    Livewire::actingAs($manager)
        ->test(ListUsers::class)        
        ->call('delete_user', $userToDelete->id)
        ->assertDispatched('user-deleted');
        
        $this->assertEquals(2, User::count());        
    
        $this->assertDatabaseMissing('users', [
            'id' => $userToDelete->id            
        ]);   
       
});

test('user can not delete users', function () {    
    $user = User::factory()->create();    
    
    Livewire::actingAs($user)
        ->test(ListUsers::class) 
        ->assertForbidden();
        
});