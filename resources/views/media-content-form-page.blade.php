@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">{{ $mediaContent ? 'Edit media' : 'Add media' }}</h1>
        </div>

        <div class="card">
            @livewire('mediaContentForm', ['mediaContent' => $mediaContent])
        </div>
    </div>
@endsection
