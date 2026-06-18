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
        return Note::with('writer:id,name')
            ->where('player_id', $playerId)
            ->get();
    }

    public function create(array $data)
    {
       return $this->note->create($data);
    }

    public function update(array $data)
    {

    }

    public function delete(int $id)
    {

    }
}
