<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
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
