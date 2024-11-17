@extends('layouts.app')

@section('title')
    Schedule form
@endsection

@section('content')
    <div class="container max-w-[800px]">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="h1">{{ $schedule ? 'Edit schedule' : 'Add schedule' }}</h1>
            </div>

            <div class="card">
                @livewire('scheduleForm', ['schedule' => $schedule, 'clone' => $clone])
            </div>
        </div>
    </div>
@endsection
