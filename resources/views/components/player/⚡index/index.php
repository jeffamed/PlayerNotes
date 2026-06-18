<?php

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Player;
use Livewire\Attributes\Computed;
use App\Services\PlayerService;

new class extends Component
{
    public ?int $selectedPlayer = 0;
    private PlayerService $playerService;

    public function boot()
    {
        $this->playerService = app(PlayerService::class);
    }
    #[Computed]
    public function players(): Collection
    {
        return $this->playerService->playersWithCountNote();
    }

    public function selectPlayer(Player $player)
    {
        $this->selectedPlayer = $player->id;
        $this->dispatch('selectPlayer', $player->id);
        $this->dispatch('playerName', $player->user->name);
    }

    #[\Livewire\Attributes\On('note-saved')]
    public function render()
    {
        return view('components.player.⚡index.index');
    }
};
