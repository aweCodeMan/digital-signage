<form wire:submit="save" class="grid grid-cols-1 gap-3">
        <label>Name <span class="text-red-800">*</span>:
            <input wire:loading.attr="disabled" id="title" type="text" wire:model="name" class="w-full">
        </label>

        <div class="text-red-800">@error('name') {{ $message }} @enderror</div>


    <hr>
    <div class="text-center">
        <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Save</button>
    </div>
</form>
