<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class InitialUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $riderRole = Role::firstOrCreate(['name' => 'rider']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@vride.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Change for production
            ]
        );
        $admin->assignRole($adminRole);

        // Rider user
        $rider = User::firstOrCreate(
            ['email' => 'rider@vride.com'],
            [
                'name' => 'Rider User',
                'password' => Hash::make('password'),
            ]
        );
        $rider->assignRole($riderRole);

        // Normal user
        $user = User::firstOrCreate(
            ['email' => 'user@vride.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
            ]
        );
        $user->assignRole($userRole);
    }
}
