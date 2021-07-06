<label class="flex items-center group cursor-pointer mb-2" title="">
    <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['room' => $room->id]))->getUri() }}" class="text-xs text-gray-500 mr-2 group-hover:text-blue-600 truncate">{{ $room->manager->name }}</a>
</label>
