<div class=" p-3 border rounded shadow bg-gray-50">
    <form wire:submit="save" class="grid grid-cols-1 gap-3">

        <h1 class="text-xl font-semibold">Add display</h1>

        <label>Name:
            <input wire:loading.attr="disabled" id="title" type="text" wire:model="name" class="w-full">
        </label>

        <div>
            <button wire:loading.attr="disabled" class="btn btn-primary" wire:loading.attr="disabled">Add</button>
        </div>
    </form>

</div>
