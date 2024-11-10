@if($items)
    <p class="text-sm font-semibold">Active schedules:</p>

    <ul class="list-disc pl-4">
        @foreach($items as $item)
            <li>
                <a class="hover:text-secondary"
                   href="{{ route('schedules.form', ['id' => $item->id])}}">{{$item->name}}</a>
            </li>
        @endforeach
    </ul>

@else
    @include('components.empty-list', ['message' => 'No active schedules.'])
@endif
