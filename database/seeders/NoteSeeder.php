<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        $writers = User::role(['admin', 'coach'])->get();

        if ($writers->isEmpty()) {
            return;
        }

        Player::query()->each(function (Player $player) use ($writers) {
            Note::factory()
                ->count(2)
                ->create([
                    'player_id' => $player->id,
                    'writer_id' => $writers->random()->id,
                ]);
        });
    }
}
