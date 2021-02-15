<div class="flex justify-between border border-gray-200 rounded p-4 cursor-default">
    <div>
        <div class="flex items-center text-sm text-gray-700">
            <i class="fal fa-calendar-alt leading-normal ml-2"></i>
            <span>@time($session->started_at, '%A %d %B %y ساعت H:i')</span>
        </div>
        <div class="flex items-center text-sm text-gray-700 mt-2">
            <i class="fal fa-clock leading-normal ml-2"></i>
            <span>{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
        </div>
        <div class="flex items-center text-sm text-gray-700 mt-2">
            <span class="text-sm text-gray-400">{{ __(ucfirst($session->status)) }}</span>
        </div>
    </div>
    <div class="flex flex-col justify-between">
        <div class="flex items-center dir-ltr text-left text-brand">
            <i class="fal fa-clipboard mr-2 text-xl"></i>
            <span class="font-semibold text-sm">{{ $session->id }}</span>
        </div>
        <div>
            <a href="#" class="flex items-center justify-center border border-gray-500 rounded-full text-xs text-gray-600 h-7 px-2 hover:bg-gray-50">{{ __('Edit session') }}</a>
        </div>
    </div>
</div>