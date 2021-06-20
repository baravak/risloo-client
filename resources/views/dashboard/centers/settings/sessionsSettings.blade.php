<div class="w-full mt-6">
    <div class="p-4 border border-gray-200 rounded">
        @foreach ($platforms as $platform)
            @include('dashboard.centers.settings.platform')
        @endforeach

        {{-- <div class="bg-gray-50 p-4 rounded mb-4">
            <div class="flex justify-between items-center mb-4">
                <a href="#" class="flex items-center justify-center text-gray-700 hover:text-white transition text-sm border border-gray-300 hover:border-brand hover:bg-brand w-6 h-6 rounded-full">
                    <i class="fal fa-pen text-xs"></i>
                </a>
                <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                    <input checked type="checkbox" name="toggle2" id="toggle2" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle2" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
            </div>
            <div>
                <div class="flex items-center cursor-default mb-2">
                    <h3 class="text-sm text-gray-800 variable-font-semibold">تماس تلفنی</h3>
                    <span class="mr-2 text-xs text-gray-600">(غیرحضوری)</span>
                </div>
                <div class="mb-3">
                    <a href="tel:+989198765432" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition">
                        <i class="fal fa-phone ml-2"></i>
                        <span class="underline">09198765432</span>
                    </a>
                </div>
                <div>
                    <label class="inline-flex items-start group">
                        <input type="checkbox" name="default" id="default" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                        <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض برای اتاق درمان و جلسه درمانی فعال باشد.')</span>
                    </label>
                </div>
            </div>
        </div> --}}

        {{-- <div class="bg-gray-50 p-4 rounded mb-4">
            <div class="flex justify-between items-center mb-4">
                <a href="#" class="flex items-center justify-center text-gray-700 hover:text-white transition text-sm border border-gray-300 hover:border-brand hover:bg-brand w-6 h-6 rounded-full">
                    <i class="fal fa-pen text-xs"></i>
                </a>
                <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                    <input type="checkbox" name="toggle3" id="toggle3" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle3" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
            </div>
            <div class="opacity-40">
                <div class="flex items-center cursor-default mb-2">
                    <h3 class="text-sm text-gray-800 variable-font-semibold">ملاقات در مرکز</h3>
                    <span class="mr-2 text-xs text-gray-600">(حضوری)</span>
                </div>
                <div class="mb-3">
                    <div class="flex items-center text-sm text-gray-500 cursor-default">
                        <i class="fal fa-file-alt ml-2 pb-1"></i>
                        <span>آدرس مرکز: تهران، خیابان آزادی، بلوار دانش، کوچه 50؛ پلاک 693</span>
                    </div>
                </div>
                <div>
                    <label class="inline-flex items-start group">
                        <input disabled type="checkbox" name="default" id="default" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                        <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض برای اتاق درمان و جلسه درمانی فعال باشد.')</span>
                    </label>
                </div>
            </div>
        </div> --}}

        <a href="{{ route('dashboard.center.setting.session-platforms.create', $center->id) }}" class="border border-green-600 border-dashed p-4 rounded mt-4 flex items-center justify-center flex-col text-green-600 hover:bg-green-50 transition focus-current ring-green-600">
            <i class="fal fa-plus"></i>
            <span class="text-sm mt-1">افزودن محل برگزاری جدید</span>
        </a>
    </div>
</div>
