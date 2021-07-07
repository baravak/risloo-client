<h3 class="text-gray-700 variable-font-bold mb-4 mt-8">@lang('Therapy Schedules')</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-4">
    @isset($user->dalily_schedule_exports->today)
        <span class="flex items-center border border-brand rounded py-2 px-4 text-white bg-brand hover:bg-brand-600 transition">
            <a href="{{ $user->dalily_schedule_exports->today->png }}" target="_blank">
                <i class="fal fa-calendar-day pb-1 ml-4 text-2xl"></i>
                <span class="text-sm variable-font-medium">برنامه درمانی امروز</span>
            </a>
        </span>
    @else
        <span class="flex items-center border border-yellow-500 rounded py-2 px-4 text-yellow-600 transition">
            <i class="fal fa-calendar-day pb-1 ml-4 text-2xl"></i>
            <span class="text-xs variable-font-medium">برنامه‌ای برای امروز ندارید!</span>
        </span>
    @endisset
    @isset($user->dalily_schedule_exports->tomorrow)
        <span class="flex items-center border border-brand rounded py-2 px-4 text-white bg-brand hover:bg-brand-600 transition">
            <a href="{{ $user->dalily_schedule_exports->tomorrow->png }}" target="_blank">
                <i class="fal fa-calendar-alt pb-1 ml-4 text-2xl"></i>
                <span class="text-sm variable-font-medium">برنامه درمانی فردا</span>
            </a>
        </span>
    @else
    <span class="flex items-center border border-yellow-500 rounded py-2 px-4 text-yellow-600 transition">
        <i class="fal fa-calendar-alt pb-1 ml-4 text-2xl"></i>
        <span class="text-xs variable-font-medium">جلسه‌ای برای فردا ثبت نشده است!</span>
    </span>
    @endisset
    {{-- <a href="#" target="_blank" class="flex items-center border border-brand rounded py-2 px-4 text-brand hover:bg-brand hover:text-white transition">
        <i class="fal fa-calendar-week pb-1 ml-4 text-2xl"></i>
        <span class="text-sm variable-font-medium">برنامه درمانی هفته</span>
    </a> --}}
</div>
