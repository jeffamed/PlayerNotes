<?php

namespace App\Repositories\Eloquents;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NoteRepository implements NoteRepositoryInterface
{
    public function __construct(protected Note $note)
    {}

    public function listByPlayer(int $playerId, bool $showMyNotes = false): Collection|array
    {
        return $this->note->with('writer:id,name')
            ->when($showMyNotes, fn($query) => $query->where('writer_id', auth()->user()->id))
            ->where('player_id', $playerId)
            ->get();
    }

    public function create(array $data): Note
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
