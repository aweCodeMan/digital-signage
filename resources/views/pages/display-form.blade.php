@extends('layouts.app')

@section('title')
    Display form
@endsection

@section('content')
    <div class="container max-w-[800px]">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="h1">{{ $item ? 'Edit display' : 'Add display' }}</h1>
            </div>

            <div class="card">
                @livewire('displayForm', ['item' => $item])
            </div>
        </div>
    </div>
@endsection
