<form wire:submit="save" class="grid grid-cols-1 gap-3">
    <label>Name <span class="text-red-800">*</span>:
        <input wire:loading.attr="disabled" id="title" type="text" wire:model="name" class="w-full">
    </label>

    <div class="text-red-800">@error('name') {{ $message }} @enderror</div>

    <label>Default media:
        <select wire:loading.attr="disabled" name="media_content_id" id="media_content_id" class="w-full"
                wire:model="media_content_id">
            <option selected value="">None selected</option>
            @foreach($mediaContents as $option)
                <option value="{{ $option->id }}">{{ $option->title }}</option>
            @endforeach
        </select>
    </label>

    <div class="text-red-800">@error('media_content_id') {{ $message }} @enderror</div>

    <hr>
    <div class="text-center">
        <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Save</button>
    </div>
</form>
