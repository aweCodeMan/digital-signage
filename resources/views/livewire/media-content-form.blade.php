<form wire:submit="save" class="grid grid-cols-1 gap-3">

    <label>Title:
        <input wire:loading.attr="disabled" id="title" type="text" wire:model="title" class="w-full">
    </label>

    @if(!$mediaContent)
        <label>
            Media type:
            <select wire:loading.attr="disabled" name="type" id="type" class="w-full"
                    wire:model="type">
                @foreach($types as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </label>
    @endif


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

    @if(!$mediaContent)
        <div x-show="$wire.type !== 'url'">
            <label>
                File<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" type="file" wire:model="file" x-bind:accept="$wire.type == 'image' ?
                'image/*' : 'video/*'">
            </label>

            <div class="text-red-800">@error('file') {{ $message }} @enderror</div>
            <div wire:loading wire:target="photo">Uploading...</div>
        </div>

    @else
        <div class="mt-6">
            <h2 class="text-sm text-gray-700">Preview:</h2>

            <div class="card">
                @include('components.media-content-preview', ['mediaContent' => $mediaContent])
            </div>
        </div>
    @endif

    <hr>
    <div class="text-center">
        <button wire:loading.attr="disabled" class="btn btn-secondary-outline" wire:loading.attr="disabled">Save
        </button>
    </div>
</form>

