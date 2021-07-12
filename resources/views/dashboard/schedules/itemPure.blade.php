<div class="flex justify-center items-center flex-1 flex-col p-2">
    <div class="flex flex-col items-center mb-4">
        <div class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
            @avatarOrName($schedule->room->manager)
        </div>
        <div class="text-xs variable-font-medium text-gray-600 mt-2">
            <span>@displayName($schedule->room->manager)</span>
        </div>
    </div>
    @if ($schedule->case)
        <div class="text-xs text-gray-500 variable-font-medium">
            <i class="fal fa-folder ml-2"></i>
            <span>@lang('Case :serial', ['serial' => $schedule->case->id])</span>
        </div>
    @endif
    @if ($schedule->clients)
        <div class="mt-2">
            <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
            <div class="inline text-xs text-gray-500">
                @foreach ($schedule->clients as $client)
                    <span>{{ $client->name }}</span>
                    @if (!$loop->last)
                        <span class="mx-1">|</span>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
