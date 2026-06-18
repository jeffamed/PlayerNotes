<?php

namespace Database\Factories;

use App\Http\Enums\TeamsEnum;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition(): array
    {
        return [
            'team' => $this->faker->randomElement(TeamsEnum::cases()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
