<?php

namespace App\Services;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;
class NoteService
{
    public function __construct(private NoteRepositoryInterface $noteRepository)
    {}

    public function save(int $playerId, string $comments): Note
    {
        $data = [
            'player_id' => $playerId,
            'comments' => $comments,
            'writer_id' => auth()->user()->id
        ];
        return $this->noteRepository->create($data);
    }

    public function notesByPlayer(int $playerId, bool $showMyNote)
    {
        return $this->noteRepository->listByPlayer($playerId, $showMyNote);
    }
}
