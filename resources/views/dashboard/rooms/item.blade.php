<a href="#" class="flex items-center sm:block border border-gray-200 rounded p-4 sm:px-4 sm:py-10 hover:bg-gray-50 overflow-hidden transition">
    <div class="flex justify-center items-center flex-shrink-0 w-20 h-20 ml-4 mb-0 sm:mb-4 sm:mx-auto bg-gray-300 text-gray-600 rounded-full border border-gray-200 overflow-hidden">
        @avatarOrName($room->manager)
    </div>
    <div>
        <div class="text-sm sm:text-base xs:text-start sm:text-center text-gray-700 font-semibold">{{ $room->manager->name }}</div>
    </div>
</a>