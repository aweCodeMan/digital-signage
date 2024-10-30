@extends('layout')

@section('content')
    <div class="py-3 bg-gray-50 border-b shadow">
        <div class="container">
            <div class="uppercase text-sm font-semibold">Control panel</div>
            displays:{{ \App\Models\Display::count() }}<br>
            schedules:{{ \App\Models\Schedule::count() }}<br>
            medias contents:{{ \App\Models\MediaContent::count() }} <br>
            medias:{{ \Spatie\MediaLibrary\MediaCollections\Models\Media::count() }}
        </div>
    </div>
    <div class="container">

        <div class="grid grid-cols-2 gap-3">
            @livewire('mediaContentForm')
            @livewire('displayForm')
        </div>

        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">Displays</h1>
        </div>

        <div class="grid grid-cols-1 gap-3">
            @foreach($displays as $display)
                <livewire-display-card :display="$display"></livewire-display-card>
            @endforeach

            @empty($displays->toArray())
                @include('components.empty-list', ['message' => 'No displays have been added.'])
            @endempty
        </div>

    </div>

    <hr class="mt-8 mb-6">

    <div class="container">
        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">Media</h1>
        </div>

        <div class="grid grid-cols-1 gap-3">
            @foreach($mediaContents as $mediaContent)
                <livewire-media-content-card :mediaContent="$mediaContent"></livewire-media-content-card>
            @endforeach

            @empty($mediaContents->toArray())
                @include('components.empty-list', ['message' => 'No media has been added.'])
            @endempty
        </div>
    </div>

@endsection
