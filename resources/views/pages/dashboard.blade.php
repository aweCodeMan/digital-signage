@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 gap-3">
            <div class="flex flex-row justify-between items-center mt-4 mb-6">
                <h1 class="h1">Dashboard</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="card">
                    <div class="flex justify-center items-center flex-col">
                        <h2 class="font-semibold text-gray-400 text-lg uppercase tracking-tight">Displays</h2>

                        <p class="text-[5rem] font-semibold my-10">{{ $stats['displays'] }}</p>

                        <p class="text-sm text-gray-600 my-6 text-center max-w-[340px]">
                            Displays are digital kiosks set up to showcase scheduled media contents.
                        </p>

                        <div>
                            <a href="{{ route('displays.form') }}">
                                <button class="btn btn-sm btn-secondary-outline">Add</button>
                            </a>

                            <a href="{{ route('displays.index') }}">
                                <button class="btn btn-link">
                                    Show all
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="flex justify-center items-center flex-col">
                        <h2 class="font-semibold text-gray-400 text-lg uppercase tracking-tight">Schedules</h2>

                        <p class="text-[5rem] font-semibold my-10">{{ $stats['schedules'] }}</p>

                        <p class="text-sm text-gray-600 my-6 text-center max-w-[340px]">
                            Schedules are lists of media contents that are shown at set times.
                        </p>

                        <div>
                            <a href="{{ route('schedules.form') }}">
                                <button class="btn btn-sm btn-secondary-outline">Add</button>
                            </a>

                            <a href="{{ route('schedules.index') }}">
                                <button class="btn btn-link">
                                    Show all
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="flex justify-center items-center flex-col">
                        <h2 class="font-semibold text-gray-400 text-lg uppercase tracking-tight">Media</h2>

                        <p class="text-[5rem] font-semibold my-10">{{ $stats['mediaContents'] }}</p>

                        <p class="text-sm text-gray-600 my-6 text-center max-w-[340px]">
                            Media content includes photos, videos, webpages and other digital assets.
                        </p>

                        <div>
                            <a href="{{ route('media_contents.form') }}">
                                <button class="btn btn-sm btn-secondary-outline">Add</button>
                            </a>

                            <a href="{{ route('media_contents.index') }}">
                                <button class="btn btn-link">
                                    Show all
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
