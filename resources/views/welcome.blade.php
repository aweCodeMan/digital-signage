@extends('layout')

@section('content')
    <div class="py-3 bg-gray-50 border-b shadow">
        <div class="container">
            <div class="uppercase text-sm font-semibold">Control panel</div>
        </div>
    </div>
    <div class="container">

        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">Displays</h1>


            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Add display</button>
        </div>


        <div class="grid grid-cols-1 gap-3">
            @foreach($displays as $display)
                <x-display-card :display="$display"></x-display-card>
            @endforeach
        </div>

    </div>

    <hr class="mt-8 mb-6">

    <div class="container">
        <div class="flex flex-row justify-between items-center mt-4 mb-6">
            <h1 class="text-lg font-semibold uppercase">Media content</h1>


            <button disabled class="disabled:bg-gray-400 disabled:text-gray-500 border font-semibold rounded bg-blue-300
        px-3 py-1 text-sm
        uppercase" title="Not yet supported">Add media</button>
        </div>


        <div class="grid grid-cols-1 gap-3">
            @foreach($mediaContents as $mediaContent)
                <x-media-content-card :mediaContent="$mediaContent"></x-media-content-card>
            @endforeach
        </div>

    </div>

@endsection


