<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $coaches = User::factory(5)->create();
        $coaches->each(function ($coach){
            $coach->assignRole('coach');
        });


        $players = User::factory(20)->create();
        $players->each(function ($player){
            $player->assignRole('player');
        });
    }
}
