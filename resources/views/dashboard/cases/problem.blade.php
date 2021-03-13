<div class="border border-gray-200 rounded p-4 cursor-default">
    <div class="flex items-center dir-ltr text-left text-brand">
        <i class="fal fa-copy mr-2 text-xl"></i>
        <span class="font-semibold text-sm">{{$case->id}}</span>
    </div>

    <div class="mt-2">
        <div class="flex items-center text-gray-700">
            <i class="fal fa-file-alt text-lg ml-2"></i>
            <span class="font-semibold">{{ __('Problem') }}</span>
        </div>
        <div class="text-sm text-gray-600 mt-1">
            <p>{{$case->detail->problem}}</p>
        </div>
    </div>
    <div class="flex items-center text-xs text-gray-500 mt-4">
            <i class="fal fa-clock ml-1"></i>
            <span>@time($case->created_at, '%A %d %B %y ساعت H:i')</span>
    </div>
</div>
