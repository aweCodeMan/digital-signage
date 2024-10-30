<div class="p-3 border rounded bg-gray-50">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-gray-900 tracking-tight text-xl font-semibold mb-3">{{ $mediaContent->title }}</h2>

        <div>
            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Edit
            </button>

            <button wire:click="delete" class="btn btn-danger-outline" wire:confirm="Are you sure you want to delete
            {{$mediaContent->title}}"
            >Remove
            </button>
        </div>
    </div>

    @if($mediaContent->getFirstMedia())
        <p class="text-sm text-gray-900">Size: {{ $mediaContent->getFirstMedia()->human_readable_size }}</p>
    @endif

    @if($mediaContent->media_type ==
  \App\Models\MediaContent::MEDIA_TYPE_URL)
        <p class="text-sm text-gray-900">URL: <a class="text-sm text-gray-500" target="_blank" href="{{ $mediaContent->data['url'] }}">{{
        $mediaContent->data['url'] }}</a></p>
    @endif

    @if($mediaContent->media_type == \App\Models\MediaContent::MEDIA_TYPE_IMAGE || $mediaContent->media_type ==
    \App\Models\MediaContent::MEDIA_TYPE_URL)
        <p class="text-sm text-gray-900">Change after: {{ $mediaContent->cutoff_seconds }}s</p>
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
