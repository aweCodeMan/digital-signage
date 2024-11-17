<form wire:submit="save" class="grid grid-cols-1 gap-3">
    <label>Name:
        <input wire:loading.attr="disabled" type="text" wire:model="name" class="w-full">
    </label>
    <div class="text-red-800">@error('name') {{ $message }} @enderror</div>

    <div class="grid grid-cols-2 gap-3">
        <div>
            <label>Start at<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" type="datetime-local" wire:model="start_at" class="w-full">
            </label>
            <div class="text-red-800">@error('start_at') {{ $message }} @enderror</div>
        </div>

        <div>
            <label>End at<span class="text-red-800">*</span>:
                <input wire:loading.attr="disabled" type="datetime-local" wire:model="end_at" class="w-full">
            </label>
            <div class="text-red-800">@error('end_at') {{ $message }} @enderror</div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="mb-2 block">
                Displays:
            </label>

            <div class="grid grid-cols-1 gap-2">
                @foreach($displays as $display)
                    <label><input wire:model="selected_displays" value="{{ $display->id }}" type="checkbox"
                                  class="mr-2">{{
                $display->name
                }}</label>
                @endforeach
            </div>
        </div>


        <div>
            <label class="mb-2 block">
                Media:
            </label>


            <div>
                <ul wire:sortable="updateMediaOrder" class="grid grid-cols-1 gap-2">
                    @foreach($sorted_media_contents as $mediaContent)
                        <li wire:sortable.item="{{ $mediaContent->id }}" wire:sortable.handle
                            wire:key="{{ $mediaContent->id }}">
                            <i class="fa-solid fa-sort opacity-50 mr-2 text-xs"></i>
                            <label ><input wire:model="selected_media_contents"
                                                               value="{{ $mediaContent->id }}"
                                                               type="checkbox"
                                                               class="mr-2">{{
                    $mediaContent->title
                    }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <p class="text-xs text-gray-500 italic mt-4">Drag and sort to change order.</p>
        </div>
    </div>

    <hr>
    <div class="text-center">
        <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Save</button>
    </div>
</form>
