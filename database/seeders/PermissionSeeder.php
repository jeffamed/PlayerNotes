<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $roleAdmin = Role::where('name', 'admin')->firstOrFail();
        $roleCoach = Role::where('name', 'coach')->firstOrFail();
        $rolePlayer = Role::where('name', 'player')->firstOrFail();
        $permissions = collect(['player_read', 'player_create', 'player_update', 'player_delete', 'note_read', 'note_create', 'note_update', 'note_delete']);

        $permissions->each(function ($permission) use ($roleAdmin, $roleCoach, $rolePlayer) {
            $permission = Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
            $permission->assignRole($roleAdmin, $roleCoach);

            if ($permission->name === 'player_read') {
                $permission->assignRole($rolePlayer);
            }
        });
    }
}
