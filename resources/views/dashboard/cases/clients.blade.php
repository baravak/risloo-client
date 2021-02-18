<div>
    <div class="relative mb-4">
        <div>
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Clients') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2">(1)</span>
            </h3>
        </div>
        <div>
            <button class="absolute top-0 left-0 flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                <i class="fal fa-plus ml-2"></i>
                <span class="font-medium">{{ __('Add client') }}</span>
            </button>
        </div>
    </div> 
    <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-2">
        @foreach ($case->clients as $client)
            <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                    {{-- @avatarOrName($client) --}}
                </div>
                <div class="flex items-center">
                    <div class="font-medium text-sm text-gray-700">@displayName($client)</div>
                </div>
            </a>
        @endforeach
    </div>
</div>