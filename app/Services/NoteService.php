<?php

namespace App\Services;

use App\Models\Note;
use App\Repositories\Contracts\NoteRepositoryInterface;
class NoteService
{
    public function __construct(private NoteRepositoryInterface $noteRepository)
    {}

    public function save(int $playerId, array $data): Note
    {
        $additionalData = [
            'player_id' => $playerId,
            'writer_id' => auth()->user()->id
        ];
        return $this->noteRepository->create(array_merge($data, $additionalData));
    }

    public function notesByPlayer(int $playerId, bool $showMyNote)
    {
        return $this->noteRepository->getNotesByPlayer($playerId, $showMyNote);
    }
}
