<?php

namespace App\Services;

use App\Repositories\Contracts\PlayerRepositoryInterface;
use App\Repositories\Eloquents\PlayerRepository;

class PlayerService
{
    protected PlayerRepositoryInterface $playerRepository;
    public function __construct()
    {
        $this->playerRepository = app(PlayerRepositoryInterface::class);
    }
    public function playersWithCountNote()
    {
        return $this->playerRepository->all();
    }
}
