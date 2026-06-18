<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use App\Services\NoteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * @test
     */
    public function save_note_on_the_database()
    {
        $writer = User::factory()->create();
        $player = Player::factory()->create();
        $this->actingAs($writer);
        $service = app(NoteService::class);
        $note = $service->save($player->id, 'Create a note from test');
        $this->assertDatabaseHas('notes', $note->toArray());
        $this->assertDatabaseHas('note', [
            'id' => $note->id,
            'player_id' => $player->id,
            'writer_id' => $writer->id,
            'comments' => 'Create a note from test'
        ]);
    }
}
