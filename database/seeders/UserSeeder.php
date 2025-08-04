<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all available roles
        $roles = Role::all();

        // Create a specific admin user for easy access
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminUser = User::firstOrCreate([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
            $adminUser->roles()->attach($adminRole);
        }

        // Create 10 random users
        User::factory(10)->create()->each(function ($user) use ($roles) {
            // Attach a random role to each user
            $user->roles()->attach(
                $roles->random(1)->pluck('id')->toArray()
            );
        });
    }
}
