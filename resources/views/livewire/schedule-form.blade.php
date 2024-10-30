<form wire:submit="save" class="grid grid-cols-1 gap-3">
    <label>Name:
        <input wire:loading.attr="disabled" type="text" wire:model="name" class="w-full">
    </label>
    <div class="text-red-800">@error('name') {{ $message }} @enderror</div>

    <label>Start at<span class="text-red-800">*</span>:
        <input wire:loading.attr="disabled" type="datetime-local" wire:model="start_at" class="w-full">
    </label>
    <div class="text-red-800">@error('start_at') {{ $message }} @enderror</div>

    <label>End at<span class="text-red-800">*</span>:
        <input wire:loading.attr="disabled" type="datetime-local" wire:model="end_at" class="w-full">
    </label>
    <div class="text-red-800">@error('end_at') {{ $message }} @enderror</div>

    <label>
        Displays:
    </label>

    <div class="grid grid-cols-3 gap-2">
        @foreach($displays as $display)
            <label><input wire:model="selected_displays" value="{{ $display->id }}" type="checkbox"
                          class="mr-2">{{
                $display->name
                }}</label>
        @endforeach
    </div>

    <label>
        Media:
    </label>

    <div class="grid grid-cols-3 gap-2">
        @foreach($mediaContents as $mediaContent)
            <label><input wire:model="selected_media_contents" value="{{ $mediaContent->id }}"
                          type="checkbox"
                          class="mr-2">{{
                $mediaContent->title
                }}</label>
        @endforeach
    </div>

    <hr>
    <div class="text-center">
        <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Save</button>
    </div>
</form>
