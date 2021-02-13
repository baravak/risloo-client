@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded p-4">
        <div class="flex items-center dir-ltr text-left text-brand">
            <i class="fal fa-copy mr-1"></i>
            <span class="font-semibold text-sm">RS966669C</span>
        </div>

        <div class="mt-2">
            <div class="flex items-center text-gray-700">
                <i class="fal fa-file-alt ml-1"></i>
                <span class="font-semibold">مسئله</span>
            </div>
            <div class="text-sm text-gray-600 mt-1">
                <p>ﻟﻮرم اﯾﭙﺴﻮم متن ﺳﺎﺧﺘﮕﯽ ﺑﺎ ﺗﻮﻟﯿﺪ ﺳﺎدﮔﯽ ﻧﺎﻣﻔﻬﻮم از ﺻﻨﻌﺖ ﭼﺎپ، و ﺑﺎ اﺳﺘﻔﺎده از ﻃﺮاﺣﺎن ﮔﺮاﻓﯿﮏ اﺳﺖ، ﭼﺎﭘﮕﺮﻫﺎ و ﻣﺘﻮن ﺑﻠﮑﻪ روزنامه و مجله در ستون و سطر آنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربرهای متنوع با هدف بهبود ابزراهای کاربردی می‌باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می‌طلبد.</p>
            </div>
        </div>

        <div class="flex items-center text-xs text-gray-500 mt-4">
                <i class="fal fa-clock ml-1"></i>
                <span>۲۰ بهمن ۱۳۹۹ ساعت ۱۷:۴۵</span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
        <div>
            <div class="mb-4">
                <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                    <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                    <span>روان‌شناسان</span>
                </h3>
            </div> 
            <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-2">
                <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                    <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                        <span>م ل</span>
                    </div>
                    <div class="flex-col items-center">
                        <div class="font-medium text-sm text-gray-700">محمدجواد لواسانی</div>
                        <div class="text-xs text-gray-600 mt-1">کد نظام روانپزشکی ۶۰۹۰۵۳۴۲۳</div>
                    </div>
                </a>
            </div>
        </div>
        <div>
            <div class="relative mb-4">
                <div>
                    <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                        <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                        <span>مراجعان</span>
                    </h3>
                </div>
                <div>
                    <button class="absolute top-0 left-0 flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                        <i class="fal fa-plus ml-2"></i>
                        <span class="font-medium">افزودن مراجع</span>
                    </button>
                </div>
            </div> 
            <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-2">
                <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                    <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                        <span>م ر</span>
                    </div>
                    <div class="flex items-center">
                        <div class="font-medium text-sm text-gray-700">محمدحسین رضوانی</div>
                    </div>
                </a>
                <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                    <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                        <span>م م</span>
                    </div>
                    <div class="flex items-center">
                        <div class="font-medium text-sm text-gray-700">منیره سادات مرتضوی</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>جلسات</span>
            </h3>
        </div>
        
        <div class="flex items-center justify-between mb-4">
            <div class="w-1/2">
                <input type="search" placeholder="جست‌وجو" class="w-full px-3 h-7 rounded border border-gray-200 font-light placeholder-gray-300">
            </div>
            <div>
                <button class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                    <i class="fal fa-plus ml-2"></i>
                    <span class="font-medium">افزودن جلسه</span>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">سریال</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">زمان</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">مدت جلسه</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">وضعیت</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-3 py-2">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default">SE966669A</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection