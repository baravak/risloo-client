<div class="flex items-center mb-4 mt-8">
    <h3 class="text-gray-700 variable-font-bold cursor-default">@lang('Therapy Schedules')</h3>
    {{-- <a href="#" class="flex items-center justify-center bg-green-600 text-white text-xs rounded-full px-2 mr-2 w-5 sm:w-auto h-5 hover:bg-green-700 transition" title="@lang('Define new schedule')">
        <i class="fal fa-plus text-xs"></i>
        <span class="hidden sm:inline-flex mr-1">@lang('Define new schedule')</span>
    </a> --}}
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-4">
    @isset($user->dalily_schedule_exports->today)
        <a href="{{ $user->dalily_schedule_exports->today->png }}" target="_blank" class="flex items-center border border-brand rounded py-2 px-4 text-brand hover:text-white hover:bg-brand transition">
            <i class="fal fa-calendar-day pb-1 ml-4 text-2xl"></i>
            <span class="text-sm variable-font-medium">برنامه درمانی امروز</span>
        </a>
    @else
        <div class="flex items-center border border-gray-400 rounded py-2 px-4 text-gray-400 transition cursor-default">
            <i class="fal fa-calendar-day pb-1 ml-4 text-2xl"></i>
            <span class="block text-xs variable-font-medium">برنامه‌ای برای امروز ندارید!</span>
        </div>
    @endisset

    @isset($user->dalily_schedule_exports->tomorrow)
        <a href="{{ $user->dalily_schedule_exports->tomorrow->png }}" target="_blank" class="flex items-center border border-brand rounded py-2 px-4 text-brand hover:text-white hover:bg-brand transition">
            <i class="fal fa-calendar-alt pb-1 ml-4 text-2xl"></i>
            <span class="text-sm variable-font-medium">برنامه درمانی فردا</span>
        </a>
    @else
        <div class="flex items-center border border-gray-400 rounded py-2 px-4 text-gray-400 transition cursor-default">
            <i class="fal fa-calendar-alt pb-1 ml-4 text-2xl"></i>
            <span class="block text-xs variable-font-medium">جلسه‌ای برای فردا ثبت نشده است!</span>
        </div>
    @endisset
    {{-- <a href="#" target="_blank" class="flex items-center border border-brand rounded py-2 px-4 text-brand hover:bg-brand hover:text-white transition">
        <i class="fal fa-calendar-week pb-1 ml-4 text-2xl"></i>
        <span class="text-sm variable-font-medium">برنامه درمانی هفته</span>
    </a> --}}
</div>
