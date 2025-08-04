<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the roles you want to create with their new attributes
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'مدیر کل',
                'role_group' => 'site_owner'
            ],
            [
                'name' => 'company',
                'display_name' => 'شرکت',
                'role_group' => 'company_member'
            ],
            [
                'name' => 'user',
                'display_name' => 'کاربر',
                'role_group' => 'default'
            ],
        ];

        // Create each role if it doesn't already exist
        foreach ($roles as $role) {
            // Use the 'name' as the unique identifier to check for existence
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
