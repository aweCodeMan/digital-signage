<div class="py-3 bg-gray-50 border-b shadow navbar">
    <div class="container flex justify-between">
        <a class="text-black uppercase text-sm font-semibold" href="{{ route('dashboard') }}">Control panel</a>

        <div class="flex flex-row items-center">
            <a href="{{ route('displays.index') }}">Displays</a>
            <a href="{{ route('schedules.index') }}">Schedules</a>
            <a href="{{ route('media_contents.index') }}">Media</a>
        </div>
    </div>
</div>
