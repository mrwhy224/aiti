<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TagSeeder::class, // Make sure you have a TagSeeder
            PostSeeder::class,
            CommentSeeder::class,
            RequestLogSeeder::class,
        ]);
        // User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        Role::create(['name'=>'webmaster', 'display_name'=>'پشتیبان فنی', 'role_group'=> 'site_owner']);
//        UserRole::create(['user_id'=>1, 'role_id'=>1]);
    }
}
