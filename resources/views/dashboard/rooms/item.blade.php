<a href="{{ $room->route('show') }}" class="border border-gray-200 rounded hover:bg-gray-50 transition">
    <div class="h-16 bg-gray-100 border-b border-gray-200"></div>

    <div class="flex justify-center items-center flex-shrink-0 w-20 h-20 mx-auto -mt-10 bg-gray-300 text-gray-600 rounded-full border-4 border-white overflow-hidden">
        @avatarOrName($room->manager)
    </div>

    <div class="p-4">
        <div class="text-sm sm:text-base text-center text-gray-700 font-medium">
            {{ $room->manager->name }}
        </div>
        <div class="text-xs text-center text-gray-700 mt-2">
            @if ($room->center->type == 'personal_clinic')
                @lang('Personal clinic')
            @else
                {{ $room->center->detail->title }}
            @endif
        </div>
    </div>
</a>