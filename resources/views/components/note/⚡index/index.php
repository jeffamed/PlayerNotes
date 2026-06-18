<?php

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

new class extends Component
{
    public ?int $selectedPlayerId = 0;
    public ?string $selectPlayerName = '';
    #[Validate('required|string|min:3|max:255')]
    public string $content = '';

    #[Computed]
    public function notes(): Collection
    {
        if ($this->selectedPlayerId === 0) {
            return collect([]);
        }
        return Note::with('writer:id,name')->where('player_id', $this->selectedPlayerId)
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function save()
    {
        $this->validate();
        \Log::info($this->content);
        Note::create([
            'player_id' => $this->selectedPlayerId,
            'writer_id' => auth()->id(),
            'comments' => $this->pull('content')
        ]);
        \Log::info('clean'.$this->content);

        //return redirect()->back();
    }

    public function render()
    {
        return view('components.note.⚡index.index');
    }
};
