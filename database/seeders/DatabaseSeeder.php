<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed permissions & roles first
        $this->call(PermissionSeeder::class);

        // Create or get Super Admin user
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Assign Super Admin role (ID = 1 or name = super-admin)
        if (!$superAdmin->hasRole('super-admin')) {
            $superAdmin->assignRole('super-admin');
        }
    }
}
