<div class="flex flex-col sm:flex-row justify-between relative border border-gray-300 rounded p-4 cursor-default">
    <div>
        <div class="flex items-center text-sm text-gray-700">
            <i class="fal fa-calendar-alt ml-2 pb-1"></i>
            <span class="variable-font-medium">@time($session->started_at, '%A %d %B %y ساعت H:i')</span>
        </div>
        <div class="flex items-center text-sm text-gray-700 mt-2">
            <i class="fal fa-clock ml-2 pb-1"></i>
            <span>{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
        </div>
        <div class="flex items-center text-sm text-gray-500 mt-2">
            <span class="text-xs bg-gray-100 px-2 py-1 rounded ml-2">جلسه گروهی</span>
            <span>{{ __(ucfirst($session->status)) }}</span>
        </div>
        <div class="flex items-center text-sm variable-font-light text-gray-400 mt-2 mb-10 sm:mb-0 w-full sm:w-11/12">
            <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،</span>
        </div>
    </div>
    <div class="flex flex-col order-first sm:order-none justify-between mb-4 sm:mb-0">
        <div class="flex items-center dir-ltr text-left text-brand">
            <i class="fal fa-clipboard mr-2 text-xl"></i>
            <span class="font-semibold text-sm en">{{ $session->id }}</span>
        </div>
        <div></div>
    </div>
    <a href="{{$session->route('edit')}}" class="absolute left-4 bottom-4 flex items-center justify-center border border-gray-500 rounded-full text-xs text-gray-600 h-8 px-4 hover:bg-gray-50">{{ __('Edit session') }}</a>
</div>

<div class="grid grdi-cols-1 sm:grid-cols-3 gap-4 mt-2 border border-gray-300 rounded p-4">
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع جلسه</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">تماس تلفنی</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">تعداد حداکثر مراجعین</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">12</div>
    </div>
    <div class="cursor-default text-center">
        <div class="text-xs text-gray-400">نوع پرداخت</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">آنلاین</div>
    </div>
</div>

<div class="grid grdi-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-2 border border-gray-300 rounded p-4">
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع انتخاب مراجع</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">انتخاب به عهده مرکز</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 xl:border-l border-gray-200">
        <div class="text-xs text-gray-400">نوع مراجعین درخواست دهنده</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">اعضاء مرکز مشاوره طلیعه سلامت</div>
    </div>
    <div class="cursor-default text-center border-b sm:border-b-0 pb-4 sm:pb-0 sm:border-l border-gray-200">
        <div class="text-xs text-gray-400">زمان شروع نوبت‌گیری</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">شنبه 1400,02,05  ساعت 20:45</div>
    </div>
    <div class="cursor-default text-center">
        <div class="text-xs text-gray-400">زمان بستن نوبت‌گیری</div>
        <div class="text-sm text-gray-600 variable-font-medium mt-2">دوشنبه 1400,02,08  ساعت 14:20</div>
    </div>
</div>