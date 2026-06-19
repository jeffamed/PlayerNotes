<?php

namespace App\Repositories\Contracts;

interface NoteRepositoryInterface
{
    public function getNotesByPlayer(int $playerId, bool $showMyNotes);
    public function create(array $data);
    public function delete(int $id);
}
