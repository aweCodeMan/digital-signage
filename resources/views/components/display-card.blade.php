<div class="p-3 border rounded bg-gray-50">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-gray-900 tracking-tight text-xl font-semibold mb-3">{{ $display->name }}</h2>

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

    <a class="text-sm text-gray-500" href="{{ route('displays.show', $display->id) }}" target="_blank">
        {{ route('displays.show',  $display->id) }}</a>


    <p class="mt-3 text-sm font-semibold">Current active schedule:</p>
    <ul class="list-disc pl-4 text-sm">
        @foreach($display->schedules as $schedule)
            <li>{{
            $schedule->mediaContent->media_type}} | {{$schedule->start_at->format('d.m.Y H:i')}} - {{
            $schedule->end_at->format('d.m.Y H:i') }}
            </li>
        @endforeach
    </ul>
</div>
