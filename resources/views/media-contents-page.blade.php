@extends('layout')

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="text-lg font-semibold uppercase">Media</h1>

                <a href="{{ route('media_contents.form') }}">
                    <button class="btn btn-primary">Add media</button>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-3">
                @foreach($mediaContents as $mediaContent)
                    <livewire-media-content-card :mediaContent="$mediaContent"></livewire-media-content-card>
                @endforeach

                @empty(count($mediaContents))
                    @include('components.empty-list', ['message' => 'No schedules have been added.'])
                @endempty
            </div>

            <div>
                {{ $mediaContents->links() }}
            </div>
        </div>

    </div>
@endsection
