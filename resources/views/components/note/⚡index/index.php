<?php

use App\Models\Note;
use Livewire\Component;
use App\Services\NoteService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;

new class extends Component
{
    public ?int $selectedPlayerId = 0;
    public ?string $selectPlayerName = '';
    public bool $showMyNotes = false;
    private NoteService $noteService;

    public function boot()
    {
        $this->noteService = app(NoteService::class);
    }

    #[Validate('required|string|min:3|max:1000')]
    public string $content = '';

    #[Computed]
    public function notes(): Collection
    {
        if ($this->selectedPlayerId === 0) return collect([]);
        return $this->noteService->notesByPlayer($this->selectedPlayerId, $this->showMyNotes);
    }

    public function save(): void
    {
        $this->validate();
        $this->noteService->save($this->selectedPlayerId, $this->content);
        $this->reset('content');
        $this->dispatch('note-saved');
    }

    public function activeMyNotes(): void
    {
        $this->showMyNotes = !$this->showMyNotes;
    }

    public function render()
    {
        return view('components.note.⚡index.index');
    }
};
