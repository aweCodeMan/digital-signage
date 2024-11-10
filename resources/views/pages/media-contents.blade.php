@extends('layouts.app')

@section('title')
    Media
@endsection

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="h1">Media</h1>

                <a href="{{ route('media_contents.form') }}">
                    <button class="btn btn-secondary-outline">Add media</button>
                </a>
            </div>

            <div class="grid  grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($mediaContents as $mediaContent)
                    <livewire-media-content-card :mediaContent="$mediaContent"></livewire-media-content-card>
                @endforeach
            </div>

            @empty(count($mediaContents))
                @include('components.empty-list', ['message' => 'No media has been added.'])
            @endempty

            <div>
                {{ $mediaContents->links() }}
            </div>
        </div>
    </div>
@endsection
