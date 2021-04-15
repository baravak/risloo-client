@extends($layouts->dashboard)
@section('content')
    <div class="flex flex-col sm:flex-row justify-between relative border border-gray-300 rounded p-4 pb-16 sm:pb-4 cursor-default">
        <div>
            <div class="flex items-center text-sm text-gray-700">
                <i class="fal fa-calendar-alt ml-2 pb-1"></i>
                <span class="variable-font-medium">شنبه 11 بهمن 99 ساعت 16:00</span>
            </div>
            <div class="flex items-center text-sm text-gray-700 mt-2">
                <i class="fal fa-clock ml-2 pb-1"></i>
                <span>60 دقیقه</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <span class="text-xs bg-gray-100 px-2 py-1 rounded ml-2">جلسه گروهی</span>
                <span>در انتظار تشکیل جلسه</span>
            </div>
            <div class="flex items-center text-sm variable-font-light text-gray-400 mt-2">
                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد،</span>
            </div>

            <div class="mt-2">
                <div class="sm:inline-block ml-4 pl-4 sm:border-l border-gray-200">
                    <span class="text-xs text-gray-400 ml-1">نوع جلسه</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">تماس تلفنی</span>
                </div>
                <div class="sm:inline-block ml-4 pl-4 sm:border-l border-gray-200">
                    <span class="text-xs text-gray-400 ml-1">تعداد حداکثر مراجعین</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">12</span>
                </div>
                <div class="sm:inline-block">
                    <span class="text-xs text-gray-400 ml-1">نوع پرداخت</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">آنلاین</span>
                </div>
            </div>

            <div class="sm:mt-1">
                <div class="sm:inline-block ml-4 pl-4 sm:border-l border-gray-200">
                    <span class="text-xs text-gray-400 ml-1">نوع انتخاب مراجع</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">انتخاب به عهده مرکز</span>
                </div>
                <div class="sm:inline-block">
                    <span class="text-xs text-gray-400 ml-1">نوع مراجعین درخواست دهنده</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">اعضاء مرکز مشاوره طلیعه سلامت</span>
                </div>
            </div>

            <div class="sm:mt-1">
                <div class="sm:inline-block ml-4 pl-4 sm:border-l border-gray-200">
                    <span class="text-xs text-gray-400 ml-1">زمان شروع نوبت‌گیری</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">شنبه 1400,02,05  ساعت 20:45</span>
                </div>
                <div class="sm:inline-block">
                    <span class="text-xs text-gray-400 ml-1">زمان بستن نوبت‌گیری</span>
                    <span class="text-sm text-gray-600 variable-font-medium mt-2">دوشنبه 1400,02,08  ساعت 14:20</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col order-first sm:order-none justify-between mb-4 sm:mb-0">
            <div class="flex items-center dir-ltr text-left text-brand">
                <i class="fal fa-clipboard mr-2 text-xl"></i>
                <span class="font-semibold text-sm en">SE96666DQ</span>
            </div>
            <div></div>
        </div>
        <a href="#" class="absolute left-4 bottom-4 flex items-center justify-center border border-gray-500 rounded-full text-xs text-gray-600 h-8 px-4 hover:bg-gray-50">{{ __('Edit session') }}</a>
    </div>

    <div class="m-auto w-full md:w-1/2 mt-4">
        <form class="w-full" method="POST">
            <div class="border border-gray-300 rounded p-4">
                <div>
                    <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">مسئله</label>
                    <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
                </div>
                <div class="mt-4">
                    <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">توضیحات</label>
                    <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">انتخاب محور جلسه</label>
                    <select class="select2-select" data-placeholder="جست‌و‌جو">
                            <option></option>
                    </select>
                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">انتخاب پرونده</label>
                    <select class="select2-select" data-placeholder="جست‌و‌جو">
                            <option></option>
                    </select>
                    <div class="flex text-xs text-gray-400 mt-2">
                        <i class="fal fa-info-circle ml-1"></i>
                        <span>اگر پرونده‌ای در جریان دارید؛ می‌توانید با انتخاب آن، این جلسه را به آن پرونده متصل نمایید.</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus mt-4" role="button">تأیید و ثبت جلسه درمانی</button>
        </form>
        <div></div>
    </div>
@endsection