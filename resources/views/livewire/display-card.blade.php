<div class="card">
    <div class="flex flex-row justify-between items-center mb-3">
        <h2 class="h1">{{ $display->name }}</h2>

        <div>
            <a href="{{ route('displays.form', ['id' => $display->id]) }}">
                <button class="btn-icon btn">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </a>
            <button wire:click="delete" class="btn btn-icon"
                    wire:confirm="Are you sure you want to delete {{$display->name}}?">
                <i class="fa-solid fa-trash-alt"></i>
            </button>
        </div>
    </div>

    <a class="text-sm text-gray-500 hover:text-secondary" href="{{ route('kiosks.show', $display->id)
    }}" target="_blank">
        <i class="fa-solid fa-link text-xs opacity-70"></i>
        {{ route('kiosks.show',  $display->id) }}</a>


    <div class="mt-3">
        @if($display->schedules->toArray())
            <p class="text-sm font-semibold">Active schedules:</p>

            <ul class="list-disc pl-4">
                @foreach($display->schedules as $schedule)
                    <li>
                        <a class="hover:text-secondary"
                           href="{{ route('schedules.form', ['id' => $schedule->id])}}">{{$schedule->name}}</a>
                    </li>
                @endforeach
            </ul>

        @else
            @include('components.empty-list', ['message' => 'No active schedules.'])
        @endif
    </div>

</div>
