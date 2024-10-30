<div class="p-3 border rounded bg-gray-50">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-gray-900 tracking-tight text-xl font-semibold mb-3">{{ $display->name }}</h2>

        <div>
            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Edit
            </button>

            <button wire:click="delete" class="btn btn-danger-outline" wire:confirm="Are you sure you want to delete
            {{$display->name}}"
            >Remove
            </button>
        </div>
    </div>

    <a class="text-sm text-gray-500" href="{{ route('displays.show', $display->id) }}" target="_blank">
        {{ route('displays.show',  $display->id) }}</a>


    <div class="w-[50%]">
        <p class="mt-3 text-sm font-semibold">Current active schedules:</p>
        @foreach($display->schedules as $schedule)
            <p class="text-sm text-gray-700">Schedule #{{ $schedule->id }} ({{$schedule->start_at->format('d.m.Y H:i')}}
                - {{
            $schedule->end_at->format('d.m.Y H:i') }})</p>
            <ul class="list-disc pl-4 text-sm">
                @foreach($schedule->mediaContents as $mediaContent)
                    <li>
                        {{ $mediaContent->title }}
                    </li>
                @endforeach
            </ul>

        @endforeach

        @empty($display->schedules->toArray())
            @include('components.empty-list', ['message' => 'No active schedules.'])
        @endempty
    </div>

</div>
