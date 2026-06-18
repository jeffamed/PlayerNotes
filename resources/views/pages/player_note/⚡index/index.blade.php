<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12">
        <h3>Player Notes</h3>
    </div>
    <div class="col-span-4">
        <div class="bg-white border rounded-lg shadow h-full">
            <livewire:player.index />
        </div>
    </div>
    <div class="col-span-8">
        <div class="bg-white border rounded-lg shadow h-full flex flex-col">
            <livewire:note.index :selectedPlayerId="$selectedPlayer" :selectPlayerName="$playerName" :key="$selectedPlayer"/>
        </div>
    </div>
</div>
