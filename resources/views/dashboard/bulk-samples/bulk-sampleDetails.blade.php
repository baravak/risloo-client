<div class="flex justify-between border border-gray-300 rounded p-4 cursor-default">
    <div>
        <div class="flex items-center relative mb-4">
            <a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="flex justify-center items-center flex-shrink-0 w-12 h-12 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                <img src="@attachmentLink($bulkSample->room->center->detail->avatar, 'samll')" class="w-full h-full object-cover object-center">
            </a>
            <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="flex justify-center items-center flex-shrink-0 w-8 h-8 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden absolute top-6 right-6">
                <img src="@attachmentLink($bulkSample->room->manager->avatar, 'samll')" class="w-full h-full object-cover object-center">
            </a>
            <div class="flex flex-col mr-4">
                <a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="text-sm font-semibold text-gray-700 hover:text-brand transition">@center($bulkSample->room->center)</a>
                <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="text-xs text-gray-600 hover:text-brand transition mt-1">{{ $bulkSample->room->manager->name }}</a>
            </div>
        </div>
        @if ($bulkSample->case)
            <a href="{{ route('dashboard.cases.show', $bulkSample->case->id) }}" class="flex items-center text-gray-700 hover:text-brand">
                <i class="fal fa-clipboard text-sm eading-normal ml-2"></i>
                <span class="text-xs">@lang('Case :serial', ['serial' => $bulkSample->case->id])</span>
            </a>
        @else
            <span class="flex items-center text-gray-600 cursor-default">
                <i class="fal fa-clipboard text-sm eading-normal ml-2"></i>
                <span class="text-xs">{{ __('Without case') }}</span>
            </span>
        @endif
        <div class="flex items-center text-sm text-gray-700 mt-2">
            <span class="text-sm text-gray-400">@lang(ucfirst($bulkSample->status))</span>
        </div>
    </div>
    <div class="flex flex-col justify-between">
        <div class="flex items-center dir-ltr text-left text-brand">
            <i class="fal fa-copy mr-2 text-xl"></i>
            <span class="font-semibold text-sm">{{ $bulkSample->id }}</span>
        </div>
        <div class="inline-flex items-center border border-gray-600 rounded-full text-xs text-gray-600">
            <div data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" class="pr-3 pl-2 py-2 cursor-pointer border-l border-gray-300 hover:bg-gray-100 transition rounded-r-full">
                <i class="fal fa-copy relative top-0.5"></i>
            </div>
            <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="pl-3 pr-2 py-2 hover:bg-gray-100 transition rounded-l-full">{{ __('Registration link') }}</a>
        </div>
    </div>
</div>
