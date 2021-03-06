<div>
    <div class="mb-4">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Therapists') }}</span>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">(۱)</span>
        </h3>
    </div>
    <div class="grid grid-cols-1 2xl:grid-cols-2 gap-2">
        <a href="{{$room->route('show')}}" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
            <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                @avatarOrName($room->manager)
            </div>
            <div class="flex items-center">
                <div class="font-medium text-sm text-gray-700">@displayName($room->manager)</div>
            </div>
        </a>
    </div>
</div>
