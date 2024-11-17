<div class="card">
    <div class="flex flex-row justify-between items-center">
        <h2 class="h1">{{ $schedule->name }}</h2>

        <div>
            <a href="{{ route('schedules.form', ['id' => $schedule->id]) }}">
                <button class="btn-icon btn">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </a>
            <a href="{{ route('schedules.form', ['clone' => $schedule->id]) }}" title="Clone schedule">
                <button class="btn-icon btn">
                    <i class="fa-solid fa-clone"></i>
                </button>
            </a>
            <button wire:click="delete" class="btn btn-icon"
                    wire:confirm="Are you sure you want to delete {{$schedule->name}}?">
                <i class="fa-solid fa-trash-alt"></i>
            </button>
        </div>
    </div>

    <div class="mb-3">
        @if($schedule->isActive())
            <div class="badge badge-secondary">Active</div>
        @elseif($schedule->isUpcoming())
            <div class="badge badge-primary">Upcoming</div>
        @else
            <div class="badge badge-primary opacity-50">Finished</div>
        @endif
    </div>

    <div class="mb-3">
        <i class="fa-regular fa-clock mr-2"></i>

        @if($schedule->isActive())
            {{$schedule->start_at->format('d.m.')}}
            <span class="mx-1">-</span>
            {{$schedule->end_at->format('d.m. H:i')}}
        @elseif($schedule->isUpcoming())
            {{$schedule->start_at->format('d.m. H:i')}}
            <span class="mx-1">-</span>
            {{$schedule->end_at->format('d.m.')}}
        @else
            {{$schedule->start_at->format('d.m.')}}
            <span class="mx-1">-</span>
            {{$schedule->end_at->format('d.m.')}}
        @endif
    </div>

    <div class="mb-3">
        <p class="text-sm font-semibold mb-2">Displays:</p>

        @if(count($schedule->displays))
            <ul class="list-disc pl-4">
                @foreach($schedule->displays as $item)
                    <li>
                        {{ $item->name }}
                    </li>
                @endforeach
            </ul>

        @else
            @include('components.empty-list', ['message' => 'Not showing on any displays.'])
        @endif
    </div>

    <div>
        <p class="text-sm font-semibold mb-2">Media:</p>

        @if(count($schedule->mediaContents))

            <ol class="list-decimal pl-4">
                @foreach($schedule->mediaContents as $item)
                    <li>
                        {{ $item->title }}
                    </li>
                @endforeach
            </ol>
        @else
            @include('components.empty-list', ['message' => 'No media.'])
        @endif
    </div>
</div>
