<?php

namespace Database\Seeders;

use App\Http\Enums\TeamsEnum;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $players = User::role('player')->get();
        $teams = collect(TeamsEnum::cases());

        $players->each(function (User $user) use ($teams) {
            Player::firstOrCreate(
                ['user_id' => $user->id,],
                ['team' => $teams->random()->value,]
            );
        });
    }
}
