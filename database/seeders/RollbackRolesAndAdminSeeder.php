<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RollbackRolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Delete the admin user
        User::where('email', 'admin@vride.com')->delete();

        // Delete the roles
        Role::whereIn('name', ['super-admin', 'ride-vehicle-owner', 'ride-passenger'])->delete();
    }
}
