<div class="flex">
    <a id="nav-prev" data-nav-prev class="flex justify-center items-center w-9 h-9 border border-gray-200 rounded-sm disabled direct">
        <i class="fal fa-chevron-right"></i>
    </a>

    <select id="nav-count" data-nav-count class="flex-1 text-sm mx-2 h-9 border border-gray-200 rounded-sm">
    </select>

    <a id="nav-next" data-nav-next class="flex justify-center items-center w-9 h-9 border border-gray-200 rounded-sm direct">
        <i class="fal fa-chevron-left"></i>
    </a>
</div>

<div class="flex items-center justify-between text-xs mt-2 mb-4 cursor-default">
    <span class="text-gray-500" id="sync_status" data-sync-status title="{{ __('Save status') }}">{{ __('No change') }}</span>
    <span class="text-gray-500" id="nav-text" data-nav-text>0/0</span>
</div>

@if (false)
    <div class="mb-4">
        <label class="flex items-center group">
            <input id="skip" type="checkbox" class="w-3.5 h-3.5 border border-gray-500 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
            <span class="text-sm text-gray-500 mr-2 group-hover:text-blue-600">{{ __('jump to empty test') }}</span>
        </label>
    </div>
@endif

<div class="nav-empty-answers" id="nav-empty-answers"></div>

@include('samples.disconnected')
