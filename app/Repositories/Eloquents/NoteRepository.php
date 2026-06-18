<?php

namespace App\Repositories\Eloquents;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{
    public function __construct(protected Note $note)
    {}

    public function listByPlayer(int $playerId)
    {

    }

    public function create(array $data)
    {

    }

    public function update(array $data)
    {

    }

    public function delete(int $id)
    {

    }
}
