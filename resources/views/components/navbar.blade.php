<div class="py-3 bg-white border-b shadow navbar">
    <div class="container flex justify-between">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>

        <div class="flex flex-row items-center">
            <a href="{{ route('displays.index') }}" class="{{ request()->routeIs('displays.index') ? 'active' : '' }}">Displays</a>
            <a href="{{ route('schedules.index') }}" class="{{ request()->routeIs('schedules.index') ? 'active' : '' }}">Schedules</a>
            <a href="{{ route('media_contents.index') }}" class="{{ request()->routeIs('media_contents.index') ? 'active' : '' }}">Media</a>
        </div>
    </div>
</div>
