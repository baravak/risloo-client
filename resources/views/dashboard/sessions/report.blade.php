<div>
    <div class="mb-4">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Report') }}</span>
        </h3>
    </div>
    <div class="grid grid-cols-1">
    @can('update', [$session , 'report'])
    @if ($session->report)
    <div class="border border-gray-200 rounded p-4 transition">
        <span class="block text-gray-600 text-sm">{{ $session->report }}</span>
        <div class="text-left mt-2">
            <a href="{{ route('dashboard.sessions.report.create', ['session' => $session->id]) }}" class="inline-flex justify-center items-center text-xs text-gray-600 border border-gray-600 hover:bg-gray-50 rounded-full h-8 px-4">{{ __('Edit report') }}</a>
        </div>
    </div>
    @else
    <div class="flex items-center justify-between border border-gray-200 rounded p-4 transition">
        <span class="text-gray-500 text-xs">هنوز گزارشی ثبت نشده است</span>
        <a href="{{ route('dashboard.sessions.report.create', $session->id) }}" class="flex items-center justify-center flex-shrink-0 rounded-full text-xs text-green-600 border border-green-600 hover:bg-green-50 h-8 px-4">{{ __('Create report') }}</a>
    </div>
    @endif
    @else
    <div class="flex items-center justify-between border border-gray-200 rounded p-4 transition">
        <span class="text-gray-500 text-xs">تنها درمان‌گران این پرونده قادر به ثبت و مشاهده گزارش می‌باشند</span>
    </div>
    @endcan
    </div>
</div>
