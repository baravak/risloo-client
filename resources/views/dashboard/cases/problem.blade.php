<div class="border border-gray-300 rounded p-4 cursor-default">
    <div class="flex items-center justify-between">
        <div class="flex items-center text-gray-700">
            <i class="fal fa-file-alt text-lg ml-2 pb-1"></i>
            <span class="font-semibold">{{ __('Problem') }}:</span>
        </div>
        <div class="flex items-center text-brand dir-ltr">
            <i class="fal fa-copy mr-2"></i>
            <span class="font-medium text-sm en">{{ $case->id }}</span>
        </div>
    </div>

    <div class="text-sm text-gray-600 mt-2">
        <p>{{$case->detail->problem}}</p>
    </div>

    <div class="flex items-center flex-wrap mt-4">
        <span class="ml-2 text-gray-700 text-xs variable-font-medium">برچسب‌ها:</span>
        <div class="flex items-center flex-wrap">
            <span class="ml-1 text-xs text-gray-500">استرس،</span>
            <span class="ml-1 text-xs text-gray-500">آسیب شناسی اجتماعی</span>
        </div>
    </div>

    <div class="flex items-center justify-between">
        <div class="flex items-center text-xs text-gray-500 mt-4">
            <i class="fal fa-clock ml-1"></i>
            <span>@time($case->created_at, '%A %d %B %y ساعت H:i')</span>
        </div>
        @can('manager', $case)
            <a href="{{ route('dashboard.client-reports.index', $case->id) }}" class="flex items-center text-xs text-brand mt-4 border border-brand hover:bg-brand hover:text-white transition rounded-full px-4 h-8">@lang('Reports of case')</a>
        @endif
    </div>
</div>
