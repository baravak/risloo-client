@extends($layouts->dashboard)
@section('content')

    {{-- Start Top details Box --}}
    <div class="flex justify-between border border-gray-200 rounded p-4 cursor-default">
        <div>
            <div class="flex items-center text-sm text-gray-700">
                <i class="fal fa-calendar-alt leading-normal ml-2"></i>
                <span>دوشنبه ۲۲ بهمن ۱۳۹۹ ساعت ۱۴:۰۰</span>
            </div>
            <div class="flex items-center text-sm text-gray-700 mt-2">
                <i class="fal fa-clock leading-normal ml-2"></i>
                <span>۹۰ دقیقه</span>
            </div>
            <div class="flex items-center text-sm text-gray-700 mt-2">
                {{-- <span class="text-sm text-yellow-500">در انتظار تشکیل جلسه</span> --}}
                {{-- <span class="text-sm text-red-500">لغو شده توسط مراجع</span> --}}
                <span class="text-sm text-green-500">در جلسه</span>
                {{-- <span class="text-sm text-gray-500">پایان یافته</span> --}}
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <div class="flex items-center dir-ltr text-left text-brand">
                <i class="fal fa-clipboard mr-2 text-xl"></i>
                <span class="font-semibold text-sm">SE9666669</span>
            </div>
            <div>
                <a href="#" class="flex items-center justify-center border border-gray-500 rounded-full text-xs text-gray-600 h-7 px-2 hover:bg-gray-50">ویرایش جلسه</a>
            </div>
        </div>
    </div>
    {{-- End Top details Box --}}

    {{-- Start Row 2 Box --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
        {{-- Start Reports Box --}}
        <div>
            <div class="mb-4">
                <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                    <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                    <span>گزارش</span>
                </h3>
            </div> 
            <div class="grid grid-cols-1">
                <div href="#" class="flex items-center justify-between border border-gray-200 rounded p-4 hover:bg-gray-50 transition">
                    <span class="text-gray-500 text-xs">هنوز گزارشی ثبت نشده است</span>
                    <a href="#" class="flex items-center justify-center rounded-full text-xs text-green-600 border border-green-600 hover:bg-green-50 h-8 px-4">ثبت گزارش</a>
                </div>
            </div>
        </div>
        {{-- End Reports Box --}}
        {{-- Start Therapists & Clients Box --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Start Therapists Box --}}
            <div>
                <div class="mb-4">
                    <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                        <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                        <span>درمانگران</span>
                    </h3>
                </div> 
                <div class="grid grid-cols-1 2xl:grid-cols-2 gap-2">
                    <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                        <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                            <span>ح ع</span>
                        </div>
                        <div class="flex-col items-center">
                            <div class="font-medium text-sm text-gray-700">حسین عبادی</div>
                            {{-- <div class="text-xs text-gray-600 mt-1">کد نظام روانپزشکی ۶۰۹۰۵۳۴۲۳</div> --}}
                        </div>
                    </a>
                </div>
            </div>
            {{-- End Therapists Box --}}
            {{-- Start Clients Box --}}
            <div>
                <div class="mb-4">
                    <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                        <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                        <span>مراجعان</span>
                    </h3>
                </div> 
                <div class="grid grid-cols-1 2xl:grid-cols-2 gap-2">
                    <a href="#" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
                        <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                            <span>م‌م</span>
                        </div>
                        <div class="flex items-center">
                            <div class="font-medium text-sm text-gray-700">محمدصادق محمدی</div>
                        </div>
                    </a>
                </div>
            </div>
            {{-- End Clients Box --}}
        </div>
        {{-- End Therapists & Clients Box --}}
    </div>
    {{-- End Row 2 Box --}}

    {{-- Start Practices Box --}}
    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Practices') }}</span>
            </h3>
        </div>
        
        <div class="flex items-center justify-between mb-4">
            <div class="w-1/2">
                <input type="search" placeholder="{{ __('Search') }}" class="w-full px-3 h-7 rounded border border-gray-200 font-light text-sm placeholder-gray-300">
            </div>
            <div>
                <a href="#" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                    <i class="fal fa-plus ml-2"></i>
                    <span class="font-medium">{{ __('Create practice') }}</span>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-gray-200 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Content') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Attachment') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Homework') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">P-9666697</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 cursor-default">تمرین شماره 1</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 cursor-default">با دقت به دیزاین نگاه بینداز و آنالیز کن. آفرین</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 cursor-default">بدون پیوست</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 cursor-default">ندارد</span>
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Practices Box --}}

    {{-- Start Samples Box --}}
    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Samples') }}</span>
            </h3>
        </div>
        
        <div class="flex items-center justify-between mb-4">
            <div class="w-1/2">
                <input type="search" placeholder="{{ __('Search') }}" class="w-full px-3 h-7 rounded border border-gray-200 font-light text-sm placeholder-gray-300">
            </div>
            <div>
                <a href="#" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                    <i class="fal fa-plus ml-2"></i>
                    <span class="font-medium">{{ __('Create sampel') }}</span>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-gray-200 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Session') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                                <th class="px-3 py-2" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="p-3 whitespace-nowrap">
                                    <div claas="flex items-center">
                                        <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default"></span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div claas="flex items-center">
                                        <span class="block text-xs font-medium text-gray-700 cursor-default"></span>
                                        {{-- <span class="block text-gray-400 font-light text-xs">ویرایش دکتر هخامنشیان - نسخه 1</span> --}}
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div claas="flex items-center">
                                        <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default"></span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div claas="flex items-center">
                                        <span class="text-xs text-gray-700 cursor-default"></span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div claas="flex items-center">
                                        <span class="text-xs text-gray-500 cursor-default"></span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap text-left dir-ltr">
                                    <div class="inline-block mr-4">
                                        <a href="#"><i class="fal fa-eye text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                    </div>
                                    <div class="inline-block">
                                        <a href="#" class="block px-2 py-1 text-xs text-gray-700 hover:text-blue-600 border border-gray-400 hover:border-blue-600 hover:bg-blue-50 rounded-full">نمره‌دهی</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Samples Box --}}
@endsection
