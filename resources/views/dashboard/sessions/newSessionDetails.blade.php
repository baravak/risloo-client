<div class="flex flex-col sm:flex-row justify-between relative border border-gray-300 rounded p-4 cursor-default">
    <div>
        <div class="flex items-center text-sm text-gray-700">
            <i class="fal fa-calendar-alt ml-2 pb-1"></i>
            <span class="variable-font-medium">@time($session->started_at, '%A %d %B %y ، ساعت H:i')</span>
        </div>
        <div class="flex items-center text-sm text-gray-700 mt-2">
            <i class="fal fa-clock ml-2 pb-1"></i>
            <span>{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
        </div>
        <div class="flex items-center text-sm text-gray-500 mt-2">
            @if ($session->group_session)
                <span class="text-xs bg-gray-100 px-2 py-1 rounded ml-2">جلسه گروهی</span>
            @endif
            <span>{{ __(ucfirst($session->status)) }}</span>
        </div>
        <div class="flex items-center text-sm variable-font-light text-gray-400 mt-2 mb-10 sm:mb-0 w-full sm:w-11/12">
            <span>{{ $session->description }}</span>
        </div>
    </div>
    <div class="flex flex-col order-first sm:order-none justify-between mb-4 sm:mb-0">
        <div class="flex items-center dir-ltr text-left text-brand">
            <i class="fal fa-clipboard mr-2 text-xl"></i>
            <span class="font-semibold text-sm en">{{ $session->id }}</span>
        </div>
        <div></div>
    </div>
        @can ('manager', [\App\Session::class, $session])
        <div class="absolute left-4 bottom-4 flex items-center h-9 border border-gray-400 rounded-full text-xs text-gray-600">
            @if (request()->route()->getAction('as') != 'dashboard.sessions.show')
                <a href="{{ route('dashboard.sessions.show', $session->id)}}" class="inline-block py-1 pr-4 pl-3 hover:text-brand transition border-l" title="@lang('View')"><i class="fal fa-eye text-sm"></i></a>
            @endif
            <a href="{{$session->route('edit')}}" class="inline-block py-1 pr-3 pl-4 border-gray-300 hover:text-brand transition" title="@lang('Edit')"><i class="fal fa-edit text-sm"></i></a>
        </div>
        @endcan
</div>
<div class="grid grdi-cols-1 sm:grid-cols-3 gap-4 mt-2 border border-gray-300 rounded p-4">
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع جلسه</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@lang($session->type)</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">تعداد حداکثر مراجعین</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">{{ $session->clients_number ?: '1' }}</div>
    </div>
    <div class="cursor-default text-center">
        <div class="text-xs text-gray-400">نوع پرداخت</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@lang($session->payment_status)</div>
    </div>
</div>
<div class="grid grdi-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-2 border border-gray-300 rounded p-4">
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع انتخاب مراجع</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@lang($session->selection_type)</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 xl:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع مراجعین درخواست دهنده</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@lang(ucfirst($session->clients_type))</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">زمان شروع نوبت‌گیری</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@time($session->opens_at, '%A %d %B %y ساعت H:i')</div>
    </div>
    <div class="cursor-default text-center">
        <div class="text-xs text-gray-400">زمان بستن نوبت‌گیری</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">@time($session->closed_at, '%A %d %B %y ساعت H:i')</div>
    </div>
</div>
