@php use App\Models\MediaContent; @endphp

@switch($mediaContent->media_type)
    @case(MediaContent::MEDIA_TYPE_IMAGE)
        @if($mediaContent->getFirstMedia())
            <img src="{{ $mediaContent->getFirstMedia()->getUrl() }}" class="w-full h-full object-cover">
        @endif
        @break
    @case(MediaContent::MEDIA_TYPE_VIDEO)
        @if($mediaContent->getFirstMedia())
            <video width="100%" height="100%" muted controls>
                <source src="{{ $mediaContent->getFirstMedia()->getUrl() }}">
                Your browser does not support the video tag.
            </video>
        @endif
        @break
    @case(MediaContent::MEDIA_TYPE_URL)
        <iframe src="{{ $mediaContent->data['url'] }}" frameborder="0" class="w-full h-full"></iframe>
        @break
    @default
        <p class="italic">Not supported</p>
@endswitch
