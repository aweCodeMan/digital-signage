<div class=" p-3 border rounded shadow bg-gray-50">
    <form wire:submit="save" class="grid grid-cols-1 gap-3">

        <h1 class="text-xl font-semibold">Add media</h1>

        <label>Title:
            <input wire:loading.attr="disabled" id="title" type="text" wire:model="title" class="w-full">
        </label>

        <label>
            Media type:
            <select wire:loading.attr="disabled" name="type" id="type" class="w-full" wire:model="type">
                @foreach($types as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </label>

        <div x-show="$wire.type == 'image' || $wire.type == 'url' ">
            <label>
                Change after seconds<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" class="w-full" wire:model="cutoffSeconds">
            </label>

            <div class="text-red-800">@error('cutoffSeconds') {{ $message }} @enderror</div>
        </div>

        <div x-show="$wire.type == 'url'">
            <label>
                Website URL<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" class="w-full" wire:model="url">
            </label>

            <div class="text-red-800">@error('url') {{ $message }} @enderror</div>
        </div>

        <div x-show="$wire.type !== 'url'">
            <label>
                File<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" type="file" wire:model="file" x-bind:accept="$wire.type == 'image' ?
                'image/*' : 'video/*'">
            </label>

            <div class="text-red-800">@error('file') {{ $message }} @enderror</div>
        </div>

        <div>
            <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Add</button>
        </div>
    </form>

</div>
