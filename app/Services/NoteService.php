<?php

namespace App\Services;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;
class NoteService
{
    private NoteRepositoryInterface $noteRepository;
    public function __construct() {
        $this->noteRepository = app(NoteRepositoryInterface::class);
    }

    public function save(int $playerId, string $comments): Note
    {
        $data = [
            'player_id' => $playerId,
            'comments' => $comments,
            'writer_id' => auth()->user()->id
        ];
        return $this->noteRepository->create($data);
    }

    public function byPlayer(int $playerId)
    {
        return $this->noteRepository->listByPlayer($playerId);
    }
}
