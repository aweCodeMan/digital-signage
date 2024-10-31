@extends('layout')

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="text-lg font-semibold uppercase">Displays</h1>

                <a href="{{ route('displays.form') }}">
                    <button class="btn btn-primary">Add display</button>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-3">
                @foreach($displays as $display)
                    <livewire-display-card :display="$display"></livewire-display-card>
                @endforeach

                @empty(count($displays))
                    @include('components.empty-list', ['message' => 'No displays have been added.'])
                @endempty
            </div>

            <div>
                {{ $displays->links() }}
            </div>
        </div>

    </div>
@endsection