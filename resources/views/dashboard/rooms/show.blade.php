@extends($layouts->dashboard)

@section('content')
<div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
                <div class="absolute top-3 left-3 flex">
                    <button class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-9 rounded-full text-sm leading-normal hover:bg-green-50 transition-all">
                        <i class="fal fa-plus ml-2"></i>
                        <span class="font-medium">افزودن پرونده</span>
                    </button>
                </div>
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($room->manager)</div>
            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($room->manager)</h2>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="flex items-center font-bold mb-4 text-gray-800 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Cases') }}</span>
        </h3>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
        <a href="#" class="border border-gray-200 rounded hover:bg-gray-50">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-green-600 text-xs ">در جریان</span>
                    </div>
                    <div class="dir-ltr text-left text-gray-500">
                        <i class="fal fa-copy mr-1"></i>
                        <span class="font-semibold text-sm">RS96666DT</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مر</span>
                        </div>
                        <span class="text-xs text-gray-500">محمدحسین رضوانی</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                            <span>مم</span>
                        </div>
                        <span class="text-xs text-gray-500">منیره‌سادات مرتضوی</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-clock ml-1"></i>
                        <span>۲۰ آذر ۱۳۹۹</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fal fa-ballot-check ml-1"></i>
                        <span>۵ آزمون</span>
                    </div>
            </div>
        </a>
    </div>
@endsection


