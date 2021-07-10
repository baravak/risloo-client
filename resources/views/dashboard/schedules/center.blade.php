@extends($layouts->dashboard)
@php
    $borders = [
        'draft' => 'gray',
        'registration_awaiting' => 'yellow',
        'client_awaiting' => 'yellow',
        'awaiting' => 'yellow',
        'session_awaiting' => 'brand',
        'in_session' => 'green',
        'finished' => 'purple',
        'canceled_by_client' => 'red',
        'canceled_by_center' => 'red',
    ];
@endphp
@section('content')
<span style="display: none" class="text-gray-400 text-yellow-400 text-brand-400 text-green-400 text-purple-400 text-red-400 opacity-30 opacity-40"></span>
    @include('dashboard.schedules.navigation')
    <div data-page="dashboard-schedules" class="border border-gray-300 rounded mt-4">
        <ul data-tabs class="space-x-4 space-x-reverse p-4 overflow-x-auto">
            @foreach ($weeks as $key => $day)
                <li class="relative">
                    <a href="#{{ $key }}" {{ $day->format('Ymd') == date('Ymd') || ($weeks->sat->timestamp > time() && $key == 'sat') ? 'data-tabby-default': ''}} class="direct focus {{ $day->format('Ymd') < date('Ymd') ? 'disable' : '' }}">
                        <span class="text-sm variable-font-medium">@time($day, '%A')</span>
                        <span class="text-xs">@time($day, 'Y/m/d')</span>
                    </a>
                    @if ($schedules->where('started_at', '>=', $day)->where('status', 'session_awaiting')->where('started_at', '<=', (clone $day)->endOfDay())->count())
                        <span class="absolute top-2 left-2 rounded-full h-1 w-1 bg-brand"></span>
                    @elseif($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay())->count())
                        <span class="absolute top-2 left-2 rounded-full h-1 w-1 bg-gray-400"></span>
                    @endif
                </li>
            @endforeach
        </ul>
        <div>
            @foreach ($weeks as $key => $day)
            <div id="{{ $key }}">
                @if (!$schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay())->count())
                    <div class="text-sm text-center text-gray-400 pb-8 pt-14">برنامه درمانی‌ای برای این روز در دسترس نیست.</div>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 p-4">
                    <a href="#" class="flex flex-col border border-brand rounded relative focus-current ring-brand transition overflow-hidden">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-blue-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">16:30</span>
                                <span class="text-xs text-gray-500">45 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="absolute animate-ping inline-flex h-full w-full rounded-full bg-brand opacity-80"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-brand"></span>
                                </div>
                                <div class="text-brand text-xs mt-2">در انتظار تشکیل جلسه</div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="flex items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>م‌ص</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mr-2">
                                    <span>محمدحسن صالحی</span>
                                </div>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <i class="fal fa-folder ml-2"></i>
                                <span>پرونده درمانی CS96666DT</span>
                            </div>
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fal fa-user-friends ml-2"></i>
                                <span>12</span>
                            </div>
                            <div class="mt-2">
                                <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                                <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                                    <div class="inline text-xs text-gray-500">
                                        <span>محور 1</span>
                                        <span class="mx-1">|</span>
                                        <span>محور 2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-xs variable-font-medium text-gray-600 mb-2">مکان‌های برگزاری جلسه:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>گوگل میت</span>
                                    <span class="mx-1">|</span>
                                    <span>ملاقات حضوری</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>محمدعلی نخلی</span>
                                    <span class="mx-1">|</span>
                                    <span>محمدرضا امامیان</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col border border-yellow-600 rounded relative focus-current ring-yellow-600 transition overflow-hidden">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-yellow-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">17:30</span>
                                <span class="text-xs text-gray-500">30 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-600"></span>
                                </div>
                                <div class="text-yellow-600 text-xs mt-2">در حال نوبت‌دهی</div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="flex items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>ح‌م</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mr-2">
                                    <span>حسین مهدوی‌نسب</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                                <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                                    <div class="inline text-xs text-gray-500">
                                        <span>بررسی وضعیت استرس</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-xs variable-font-medium text-gray-600 mb-2">مکان‌های برگزاری جلسه:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>تماس تلفنی</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col border border-gray-400 rounded relative focus-current ring-gray-400 transition overflow-hidden opacity-60">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-gray-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">17:30</span>
                                <span class="text-xs text-gray-500">30 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-gray-400"></span>
                                </div>
                                <div class="text-gray-400 text-xs mt-2">در انتظار تأیید مراجع</div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center flex-1 flex-col p-2">
                            <div class="flex flex-col items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>ح‌م</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mt-2">
                                    <span>حسین مهدوی‌نسب</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>محمدعلی نخلی</span>
                                    <span class="mx-1">|</span>
                                    <span>محمدرضا امامیان</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col border border-gray-400 rounded relative focus transition overflow-hidden opacity-60">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-gray-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">17:30</span>
                                <span class="text-xs text-gray-500">30 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                </div>
                                <div class="text-red-500 text-xs mt-2">لغو شده توسط مرکز</div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center flex-1 flex-col p-2">
                            <div class="flex flex-col items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>ح‌م</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mt-2">
                                    <span>حسین مهدوی‌نسب</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>محمدعلی نخلی</span>
                                    <span class="mx-1">|</span>
                                    <span>محمدرضا امامیان</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col border border-gray-400 rounded relative focus transition overflow-hidden opacity-60">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-gray-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">17:30</span>
                                <span class="text-xs text-gray-500">30 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                                </div>
                                <div class="text-purple-500 text-xs mt-2">تمام شده</div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center flex-1 flex-col p-2">
                            <div class="flex flex-col items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>ح‌م</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mt-2">
                                    <span>حسین مهدوی‌نسب</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>محمدعلی نخلی</span>
                                    <span class="mx-1">|</span>
                                    <span>محمدرضا امامیان</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex flex-col border border-gray-400 rounded relative focus transition overflow-hidden opacity-60">
                        <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-gray-50">
                            <div class="flex flex-col">
                                <span class="variable-font-semibold">17:30</span>
                                <span class="text-xs text-gray-500">30 دقیقه</span>
                            </div>
                            <div class="flex flex-col dir-ltr text-left">
                                <div class="flex h-2 w-2 relative">
                                    <span class="absolute animate-ping inline-flex h-full w-full rounded-full bg-green-600 opacity-80"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-600"></span>
                                </div>
                                <div class="text-green-600 text-xs mt-2">در جلسه</div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center flex-1 flex-col p-2">
                            <div class="flex flex-col items-center mb-4">
                                <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                    <span>ح‌م</span>
                                </div>
                                <div class="text-xs variable-font-medium text-gray-600 mt-2">
                                    <span>حسین مهدوی‌نسب</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                <div class="inline text-xs text-gray-500">
                                    <span>محمدعلی نخلی</span>
                                    <span class="mx-1">|</span>
                                    <span>محمدرضا امامیان</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection