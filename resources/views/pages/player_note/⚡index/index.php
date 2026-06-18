<?php

use App\Models\Player;
use Livewire\Component;
use Livewire\Attributes\On;

new class extends Component
{
    public int $selectedPlayer = 0;
    public string $playerName = '';

    #[On('selectPlayer')]
    public function selectPlayer(int $player)
    {
        $this->selectedPlayer = $player;
    }

    #[On('playerName')]
    public function setPlayerName(string $playerName)
    {
        $this->playerName = $playerName;
    }

};
