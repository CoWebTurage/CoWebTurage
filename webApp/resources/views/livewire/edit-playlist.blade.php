<div>
    @foreach ($playlists as $playlist)
        <div wire:key="{{ $playlist["url"] }}" class="my-2 p-2 rounded bg-white flex justify-between">
            <div>{{ $playlist["url"] }}</div>
            <div>
                <button @disabled($loop->first) wire:click="up({{ $loop->index }})" class="primary-button w-6 aspect-square"><i class="fas fa-arrow-up"></i></button>
                <button @disabled($loop->last) wire:click="down({{ $loop->index }})" class="primary-button w-6 aspect-square"><i class="fas fa-arrow-down"></i></button>
                <button wire:click="delete({{ $loop->index }})" class="primary-button w-6 aspect-square"><i class="fas fa-times"></i></button>
            </div>
        </div>
    @endforeach
    <div class="flex">
        <x-text-input wire:model.live="new_url" placeholder="https://..." class="flex-grow"/>
        <button wire:click="add" class="primary-button h-10 aspect-square"><i class="fas fa-plus"></i></button>
        <div>@error('new_url') {{ $message }} @enderror</div>
    </div>
    <div>
        <x-primary-button wire:click="confirm">Save</x-primary-button>
        <x-primary-button wire:click="cancel">Cancel</x-primary-button>
    </div>
</div>
