<?php

namespace App\Repositories\Eloquents;

use App\Models\Player;
use App\Repositories\Contracts\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{
    public function __construct(protected Player $player)
    {}
    public function all()
    {

    }

    public function searchByName(string $name)
    {

    }

    public function filterByTeam(string $team)
    {

    }
}

