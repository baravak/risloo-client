<div class="p-2">
    <div class="flex items-center mb-4">
        <div class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
            @avatarOrName($schedule->room->manager)
        </div>
        <div class="text-xs variable-font-medium text-gray-600 mr-2">
            <span>@displayName($schedule->room->manager)</span>
        </div>
    </div>
    @if ($schedule->case)
        <div class="flex items-center text-xs text-gray-500">
            <i class="fal fa-folder ml-2"></i>
            <span>@lang('Case :serial', ['serial' => $schedule->case->id])</span>
        </div>
    @endif
    {{-- <div class="flex items-center text-xs text-gray-500 mt-2">
        <i class="fal fa-user-friends ml-2"></i>
        <span>12</span>
    </div> --}}
    @if ($schedule->clients)
        <div class="mt-2">
            <span class="block text-xs variable-font-medium text-gray-600 mb-2">مراجعین</span>
            <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                <div class="inline text-xs text-gray-500">
                    @foreach ($schedule->clients as $client)
                        <span>{{ $client->name }}</span>
                        @if (!$loop->last)
                            <span class="mx-1">|</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="mt-2">
        <span class="inline text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه:</span>
        <div class="inline text-xs text-gray-500">
            @foreach ($schedule->clients && $schedule->clients->count() ? $schedule->clients->pluck('field')->unique() : $schedule->fields as $field)
                <span title="@lang('amount :amount Toman', ['amount' => isset($field->amount) ? $field->amount : 0])">{{ $field->title }}</span>
                @if (!$loop->last)
                    <span class="mx-1">|</span>
                @endif
            @endforeach
        </div>
    </div>
    <div class="mt-2">
        <span class="text-xs variable-font-medium text-gray-600 mb-2">مکان‌های برگزاری جلسه:</span>
        <div class="inline text-xs text-gray-500">
            @foreach ($schedule->clients && $schedule->clients->count() ? $schedule->clients->pluck('session_platform')->unique() : ($schedule->session_platforms ?: []) as $platform)
                <span>{{ isset($platform->title) ? $platform->title : '' }}</span>
                @if (!$loop->last)
                    <span class="mx-1">|</span>
                @endif
            @endforeach
        </div>
    </div>
</div>
