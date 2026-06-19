<div class="bg-white border rounded-lg shadow h-[700px] flex flex-col">
    <div class="border-b px-4 py-3 font-semibold flex items-center justify-between">
        Notes of Players {{ $selectPlayerName }}
        @if($this->selectedPlayerId !== 0 && !$isPlayer)
        <button
            @class([
                'px-2 py-2 text-white rounded-lg',
                'bg-gray-600' => !$showMyNotes,
                'bg-blue-600' => $showMyNotes
                ])
                wire:click="activeMyNotes">
            My Notes
        </button>
        @endIf
    </div>
    @if($this->selectedPlayerId === 0)
        <div class="p-4 text-center">
            <p class="text-gray-500">Please select a player to view their notes.</p>
        </div>
    @endif
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto p-4 space-y-3">
            @foreach($this->notes as $note)
                <div class="flex justify-start">
                    <div class="max-w-[80%]">
                        <div class="bg-blue-100 border border-blue-200 rounded-2xl px-4 py-3">
                            <p class="text-sm">
                                {{ $note->comments }}
                            </p>
                        </div>
                        <div class="mt-1 text-xs text-gray-500">
                            {{ $note->writer->id === auth()->id() ? 'You' : $note->writer->name }} • {{ $note->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(!$this->isPlayer && $this->selectedPlayerId !== 0 && auth()->user()->can('note_create'))
        <div class="border-t p-4">
            <form wire:submit="save">
                <div class="flex gap-2">
                    <textarea
                        wire:model="form.comments"
                        x-on:note-saved.window="$el.value = ''"
                        rows="2"
                        placeholder="Write a note..."
                        class="flex-1 rounded-lg border-gray-300"
                    ></textarea>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Send
                    </button>
                </div>
                @error('form.comments') <span style="color: red;">{{ $message }}</span> @enderror
            </form>
        </div>
        @endif
    </div>
</div>
