<a href="{{ $center->route('show') }}" class="border border-gray-200 rounded hover:bg-gray-50 transition">
    <div class="h-24 bg-gray-100 border-b border-gray-200"></div>

    <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 mx-auto -mt-12 bg-gray-300 text-gray-600 rounded-full border-4 border-white overflow-hidden">
        @avatarOrName($center->detail)
    </div>

    <div class="p-4">
        <div class="text-sm sm:text-base xs:text-start text-center text-gray-700 font-semibold">@displayName($center->detail)</div>

        @if ($center->type == 'counseling_center')
            <div class="text-xs text-center text-gray-700 mt-2">{{ $center->manager->name }}</div>
        @else
            <div class="text-xs text-center text-gray-500 mt-2">{{ __('Clinic') }}</div>
        @endif
    </div>
</a>