<?php

namespace App\Repositories\Contracts;

interface PlayerRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function searchByName(string $name);

    public function filterByTeam(string $team);
}
