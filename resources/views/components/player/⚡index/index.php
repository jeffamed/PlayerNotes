<?php

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Player;
use Livewire\Attributes\Computed;

new class extends Component
{
    #[Computed]
    public function players(): Collection
    {
        return Player::with('user:id,name')->withCount('notes')->get();
    }

    public function selectPlayer(Player $player)
    {
        $this->dispatch('selectPlayer', $player->id);
        $this->dispatch('playerName', $player->user->name);
    }

    public function render()
    {
        return view('components.player.⚡index.index');
    }
};
