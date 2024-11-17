@extends('layouts.app')

@section('title')
    Schedules
@endsection

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="h1">Schedules</h1>

                <a href="{{ route('schedules.form') }}">
                    <button class="btn btn-secondary-outline">Add schedule</button>
                </a>
            </div>

            <div class="grid  grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($schedules as $schedule)
                    <livewire-schedule-card :schedule="$schedule"></livewire-schedule-card>
                @endforeach
            </div>

            @empty(count($schedules))
                @include('components.empty-list', ['message' => 'No schedules have been added.'])
            @endempty

            <div>
                {{ $schedules->links() }}
            </div>
        </div>

    </div>
@endsection
