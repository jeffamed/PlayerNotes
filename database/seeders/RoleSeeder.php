<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $roles = collect(['admin', 'coach', 'player']);

        $roles->each(function ($role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        });
    }
}
