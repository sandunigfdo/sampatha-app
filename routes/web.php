<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\DeleteUser;
use App\Livewire\Users\ListUsers;
use App\Livewire\Users\UpdateUser;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('create-user', CreateUser::class)->name('users.create')
        ->can('create',User::class);
    Route::get('list-users', ListUsers::class)->name('users.list')
        ->can('viewAny', User::class);
    Route::get('update-users/{user}', UpdateUser::class)->name('users.update')
        ->can('update', User::class);  
    
   
});

require __DIR__.'/auth.php';
