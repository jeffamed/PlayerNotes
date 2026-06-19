<?php

use Livewire\Component;
use App\Services\NoteService;
use App\Livewire\Forms\NoteForm;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;

new class extends Component
{
    private NoteService $noteService;
    public NoteForm $form;
    public ?int $selectedPlayerId = 0;
    public ?string $selectPlayerName = '';
    public bool $showMyNotes = false;
    public bool $isPlayer = false;

    public function mount()
    {
        $this->isPlayer = auth()->user()->hasRole('player');
    }

    public function boot()
    {
        $this->noteService = app(NoteService::class);
    }

    #[Computed]
    public function notes(): Collection
    {
        if ($this->selectedPlayerId === 0) return collect([]);
        return $this->noteService->notesByPlayer($this->selectedPlayerId, $this->showMyNotes);
    }

    public function save(): void
    {
        $this->form->validate();
        $this->noteService->save($this->selectedPlayerId, $this->form->all());
        $this->form->reset('content');
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
