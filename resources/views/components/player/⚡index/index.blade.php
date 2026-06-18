<div>
    <div class="border-b px-4 py-3 font-semibold">
        List of Players
    </div>
    <div class="divide-y">
        @foreach ($this->players as $player)
            <button
                wire:click="selectPlayer({{ $player }})"
                class="w-full text-left px-4 py-3 hover:bg-gray-50 transition"
            >
                <div class="flex items-center justify-between">
                    <div class="font-medium">
                        {{ $player->user->name }}
                    </div>
                    <span class="inline-flex items-center justify-center w-7 h-7text-xs font-semibold text-white bg-gray-600 rounded-full">
                        {{ $player->notes_count }}
                    </span>

                </div>
                <div class="text-sm text-gray-500">
                    {{ \App\Http\Enums\TeamsEnum::from($player->team)->label() }}
                </div>
            </button>
        @endforeach
    </div>
</div>
