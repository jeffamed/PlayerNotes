<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleCoach = Role::where('name', 'coach')->first();
        $rolePlayer = Role::where('name', 'player')->first();
        $permissions = collect(['player_read', 'player_create', 'player_update', 'player_delete', 'note_read', 'note_create', 'note_update', 'note_delete']);
        $permissions->each(function ($permission) use ($roleAdmin, $roleCoach) {
            $permission = Permission::create(['name' => $permission]);
            $permission->assignRole($roleAdmin);
            $permission->assignRole($roleCoach);
        });

        $permissionPlayerRead = Permission::create(['name' => 'player_read']);
        $rolePlayer->givePermissionTo($permissionPlayerRead);
    }
}
