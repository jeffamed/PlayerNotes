<div>
    <div class="border-b px-4 py-3 font-semibold">
        Notes of Players {{ $selectPlayerName }}
    </div>
    @if($this->selectedPlayerId === 0)
        <div class="p-4">
            <p class="text-gray-500">Please select a player to view their notes.</p>
        </div>
    @endif
    <div>
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
        @if(auth()->user()->can('note_create') && $this->selectedPlayerId !== 0)
        <div class="border-t p-4">
            <form wire:submit="save">
                <div class="flex gap-2">
                    <textarea
                        wire:model="content"
                        rows="2"
                        placeholder="Write a note..."
                        class="flex-1 rounded-lg border-gray-300"
                    ></textarea>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Send
                    </button>
                </div>
                <div class="text-red-500 text-sm">@error('content') {{ $message }} @enderror</div>
            </form>
        </div>
        @endif
    </div>
</div>
