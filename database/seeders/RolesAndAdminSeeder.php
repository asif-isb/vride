<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);
        $vehicleOwnerRole = Role::firstOrCreate(['name' => 'ride-vehicle-owner']);
        $passengerRole = Role::firstOrCreate(['name' => 'ride-passenger']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@vride.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Change this in production
            ]
        );

        $admin->assignRole($superAdminRole);
    }
}
