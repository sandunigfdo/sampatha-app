<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\ListUsers;
use App\Livewire\Users\UpdateUser;
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

    Route::get('create-user', CreateUser::class)->name('create_user')
        ->middleware('can:create,App\Models\User');
    Route::get('list-users', ListUsers::class)->name('list_users');
    Route::get('update-users/{user}', UpdateUser::class)->name('update_users');
    
   
});

require __DIR__.'/auth.php';
