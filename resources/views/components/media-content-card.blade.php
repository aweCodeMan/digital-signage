<div class="p-3 border rounded bg-gray-50">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-gray-900 tracking-tight text-xl font-semibold mb-3">{{ $mediaContent->title }}</h2>

        <div>
            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Edit
            </button>

            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Remove
            </button>
        </div>
    </div>

    @if($mediaContent->getFirstMedia())
        <p class="text-sm text-gray-900">Size: {{ $mediaContent->getFirstMedia()->human_readable_size }}</p>
    @endif

    <p class="mt-3 text-sm font-semibold">Current active schedules:</p>
    <ul class="list-disc pl-4 text-sm">
        @foreach($mediaContent->schedules as $schedule)
            <li>{{ $schedule->display->name  }} | {{$schedule->start_at->format('d.m.Y H:i')}} - {{
            $schedule->end_at->format('d.m.Y H:i') }}
            </li>
        @endforeach
    </ul>
</div>
