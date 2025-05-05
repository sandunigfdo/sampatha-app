<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => env('SEED_USER_NAME'),
            'email' => env('SEED_USER_EMAIL'),
            'password' => env('SEED_USER_PASSWORD'),
            'role_id' => env('SEED_USER_ROLE'),
        ]);
    }
}
