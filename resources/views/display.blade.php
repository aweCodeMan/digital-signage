@extends('layout')

@section('content')
    <div class="container">
        @foreach($display->schedules as $schedule)
            @switch($schedule->mediaContent->media_type)
                @case(\App\Models\MediaContent::MEDIA_TYPE_IMAGE)
                    <div class="border p-2">
                        <p class="uppercase">Image</p>
                        <img src="{{ $schedule->mediaContent->getFirstMedia()->getFullUrl() }}" alt="">
                    </div>
                    @break
                @case(\App\Models\MediaContent::MEDIA_TYPE_VIDEO)
                    <div class="border p-2">
                        <p class="uppercase">Video</p>
                        <video autoplay muted loop>
                            <source src="{{ $schedule->mediaContent->getFirstMedia()->getFullUrl() }}" type="video/mp4">
                        </video>
                    </div>
                    @break
                @case(\App\Models\MediaContent::MEDIA_TYPE_URL)
                    <div class="border p-2">
                        <p class="uppercase">URL</p>
                        <iframe src="https://kinodvor.kupikarto.si/index.php" class="w-full" style="height: 50vh"></iframe>
                    </div>
                    @break
            @endswitch
        @endforeach
    </div>
@endsection
