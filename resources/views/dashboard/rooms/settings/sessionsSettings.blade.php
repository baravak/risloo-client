<div class="w-full mt-6">
    <div class="p-4 border border-gray-200 rounded">
        @foreach ($platforms as $platform)
            @include('dashboard.rooms.settings.platform')
        @endforeach
    </div>
</div>
