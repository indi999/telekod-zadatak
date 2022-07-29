<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'eve.holt@reqres.in',
            'pin' => 18678,
            'token' => null,
            'password' => bcrypt('cityslicka'),
            'email_verified_at' => now(),
        ]);
    }
}
