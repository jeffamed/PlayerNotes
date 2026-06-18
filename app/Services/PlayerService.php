<?php

namespace App\Services;

use App\Repositories\Contracts\PlayerRepositoryInterface;
use App\Repositories\Eloquents\PlayerRepository;

class PlayerService
{
    public function __construct(protected PlayerRepositoryInterface $playerRepository)
    {}
    public function playersWithCountNote()
    {
        return $this->playerRepository->all();
    }
}
