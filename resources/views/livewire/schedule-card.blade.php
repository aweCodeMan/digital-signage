<div class="p-3 border rounded bg-gray-50">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-gray-900 tracking-tight text-xl font-semibold mb-3">{{ $schedule->name }}</h2>

        <div>
            <a href="{{ route('schedules.form', ['id' => $schedule->id]) }}">
                <button class="btn btn-primary-outline">Edit
                </button>
            </a>

            <button wire:click="delete" class="btn btn-danger-outline" wire:confirm="Are you sure you want to delete
            {{$schedule->name}}"
            >Remove
            </button>
        </div>
    </div>

    <div class="w-[50%]">
        <p class="text-sm text-gray-700">
        <ul>
            @foreach($schedule->displays as $display)
                <li>
                    {{ $display->name  }}

                </li>
            @endforeach
        </ul>


        ({{$schedule->start_at->format('d.m.Y
            H:i')}}
        - {{
            $schedule->end_at->format('d.m.Y H:i') }})</p>
        <ul class="list-disc pl-4 text-sm">
            @foreach($schedule->mediaContents as $mediaContent)
                <li>
                    {{ $mediaContent->title }}
                </li>
            @endforeach
        </ul>
    </div>

</div>
