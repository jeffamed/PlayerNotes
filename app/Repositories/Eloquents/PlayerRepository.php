<?php

namespace App\Repositories\Eloquents;

use App\Models\Player;
use App\Repositories\Contracts\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function __construct(protected Player $player)
    {}
    public function all(): Collection|array
    {
        return $this->player->with('user:id,name')->withCount('notes')->get();
    }

    public function searchByName(string $name)
    {

    }

    public function filterByTeam(string $team)
    {

    }
}

