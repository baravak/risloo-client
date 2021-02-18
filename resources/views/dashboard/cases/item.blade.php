<a href="{{ $case->route('show') }}" class="flex flex-col justify-between border border-gray-200 rounded hover:bg-gray-50">
    <div class="p-4">
        <div class="flex items-center justify-between">
            <div>
                <span class="text-green-600 text-xs">{{ $case->status }}</span>
            </div>
            <div class="dir-ltr text-left text-gray-500">
                <i class="fal fa-copy mr-1"></i>
                <span class="font-semibold text-sm">{{ $case->id }}</span>
            </div>
        </div>
        <div class="mt-4">
            @foreach ($case->clients as $client)
            <div class="flex items-center">
                <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                    {{-- @avatarOrName($client->user) --}}
                </div>
                <span class="text-xs text-gray-500">@displayName($client->user)</span>
            </div>
            @endforeach
        </div>
    </div>
    <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
            <div class="text-xs text-gray-500">
                <i class="fal fa-clock ml-1"></i>
                <span>@time($case->created_at, '%A %d %B %y')</span>
            </div>
            <div class="text-xs text-gray-500">
                <i class="fal fa-user-friends ml-1"></i>
                <span>{{ __(':count sessions', ['count' => $case->sessions_count]) }}</span>
            </div>
    </div>
</a>
