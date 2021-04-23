<a href="{{ $case->route('show') }}" class="flex flex-col justify-between border border-gray-200 rounded hover:bg-gray-50 transition">
    <div class="p-4">
        <div class="flex items-center justify-between">
            <span class="text-gray-600 text-xs">{{ $case->status }}</span>
            <div class="text-left text-gray-500 dir-ltr">
                <i class="fal fa-copy align-middle mr-1"></i>
                <span class="font-medium text-sm">{{ $case->id }}</span>
            </div>
        </div>
        <div class="mt-4">
            @foreach ($case->clients ?: [] as $client)
                <div class="text-xs">
                    <i class="fal fa-user align-middle text-gray-700 ml-2"></i>
                    <span class="text-gray-500">@displayName($client)</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3">
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
