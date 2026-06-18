<?php

namespace App\Repositories\Contracts;

interface NoteRepositoryInterface
{
    public function listByPlayer(int $playerId, bool $showMyNotes);
    public function create(array $data);
    public function update(array $data);
    public function delete(int $id);
}
