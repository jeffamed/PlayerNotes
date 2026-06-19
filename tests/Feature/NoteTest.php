<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\User;
use App\Services\NoteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;
    #[Test]
    public function save_note_on_the_database()
    {
        $writer = User::factory()->create();
        $player = Player::factory()->create();
        $this->actingAs($writer);
        $service = app(NoteService::class);
        $note = $service->save($player->id, 'Create a note from test');
        $this->assertNotNull($note);
        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'player_id' => $player->id,
            'writer_id' => $writer->id,
            'comments' => 'Create a note from test'
        ]);
        $this->assertEquals($player->id, $note->player_id);
        $this->assertEquals($writer->id, $note->writer_id);
    }
}
