<div class="text-xs text-gray-500 group-hover:text-blue-600" id="nav-empty-answers"></div>

<div class="mb-4">
    <label class="flex items-center group">
        <input id="skip" type="checkbox" class="w-3.5 h-3.5 border border-gray-500 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-500 mr-2 group-hover:text-blue-600">{{ __('jump to empty test') }}</span>
    </label>
</div>

<div class="flex items-center justify-between text-xs mb-2 mt-4 cursor-default">
    <span class="text-gray-500" data-sync-status title="{{ __('Save status') }}">{{ __('No change') }}</span>
    <span class="text-gray-500" data-nav-text>0/0</span>
</div>

<div class="flex">
    <a data-nav-prev class="flex justify-center items-center w-12 h-12 border border-gray-300 rounded-sm disabled direct">
        <i class="fal fa-chevron-right"></i>
    </a>

    <a data-nav-next class="flex justify-center items-center w-12 h-12 border border-gray-300 rounded-sm mr-2 direct">
        <i class="fal fa-chevron-left"></i>
    </a>

    <select data-nav-count class="flex-1 text-sm mr-4 h-12 border border-gray-300 rounded-sm">
    </select>
</div>

@include('samples.disconnected')
