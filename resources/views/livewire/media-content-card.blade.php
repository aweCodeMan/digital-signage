@php use App\Models\MediaContent; @endphp

<div class="card">
    <div class="flex flex-row justify-between items-center mb-3">
        <h2 class="h1">{{ $mediaContent->title }}</h2>

        <div>
            <a href="{{ route('media_contents.form', ['id' => $mediaContent->id]) }}">
                <button class="btn-icon btn">
                    <i class="fa-solid fa-pencil"></i>
                </button>
            </a>
            <button wire:click="delete" class="btn btn-icon"
                    wire:confirm="Are you sure you want to delete {{$mediaContent->title}}?">
                <i class="fa-solid fa-trash-alt"></i>
            </button>
        </div>
    </div>

    @if($mediaContent->getFirstMedia())
        <p class="text-sm text-gray-700">Size: <span class="text-black font-semibold">{{ $mediaContent->getFirstMedia()
        ->human_readable_size
        }}</span></p>
    @endif

    @if($mediaContent->media_type == MediaContent::MEDIA_TYPE_URL)
        <p class="text-sm text-gray-900">URL: <a class="text-sm text-secondary" target="_blank"
                                                 href="{{ $mediaContent->data['url'] }}">{{
        $mediaContent->data['url'] }}</a></p>
    @endif

    @if($mediaContent->media_type == MediaContent::MEDIA_TYPE_IMAGE || $mediaContent->media_type ==
    MediaContent::MEDIA_TYPE_URL)
        <p class="text-sm text-gray-900">Change after: <span class="text-black font-semibold">{{
        $mediaContent->cutoff_seconds }}s</span></p>
    @endif

    <div class="mt-3">
        @include('components.active-schedules-list', ['items' => $mediaContent->schedules])
    </div>
    <hr class="my-3">

    <div class="mt-3">
        <p class="text-sm font-semibold mb-2">Preview:</p>

        @include('components.media-content-preview', ['mediaContent' => $mediaContent])
    </div>
</div>
