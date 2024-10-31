@extends('layout')

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="text-lg font-semibold uppercase">Dashboard</h1>
            </div>

            <div class="grid grid-cols-3 gap-3">

                @foreach($stats as $stat)
                    <a href="{{ $stat['link'] }}">
                        <div class="card text-center">
                            <p class="text-sm uppercase font-semibold text-gray-500 mb-3">{{ $stat['label'] }}</p>

                            <p class="text-[7rem] leading-none font-bold">{{ $stat['data'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
