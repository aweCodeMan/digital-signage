@extends('layout')

@section('content')
    <div class="container">
        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">{{ $display ? 'Edit display' : 'Add display' }}</h1>
        </div>

        <div class="card">
            @livewire('displayForm', ['display' => $display])
        </div>
    </div>
@endsection