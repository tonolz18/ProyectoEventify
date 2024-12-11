<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $organizerRole = Role::where('name', 'organizer')->first();
        $userRole = Role::where('name', 'user')->first();

        $organizer = User::create([
            'name' => 'Organizer User',
            'email' => 'organizer@example.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        $organizer->roles()->attach($organizerRole);
        $user->roles()->attach($userRole);
    }
}
