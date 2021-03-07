<div class="flex-shrink-0 w-56">
    <div class="flex">
        <a href="" id="nav-prev" class="flex justify-center items-center w-9 h-9 border border-gray-200 rounded-sm disabled direct">
            <i class="fal fa-chevron-right"></i>
        </a>

        <select id="nav-count" class="flex-1 text-sm mx-2 h-9 border border-gray-200 rounded-sm">
            <option value="">توضیحات</option>
            <option value="">مقدمه</option>
            <option value="">۱</option>
            <option value="">۲</option>
            <option value="">۳</option>
            <option value="">۴</option>
        </select>

        <a href="" id="nav-next" class="flex justify-center items-center w-9 h-9 border border-gray-200 rounded-sm direct">
            <i class="fal fa-chevron-left"></i>
        </a>
    </div>

    <div class="flex items-center justify-between text-xs mt-2 mb-4">
        <span class="text-gray-500" id="sync_status" title="{{ __('Save status') }}">{{ __('No change') }}</span>
        <span class="text-gray-500">0/72</span>
    </div>

    <div class="mb-4">
        <label class="flex items-center group">
            <input id="skip" type="checkbox" class="w-3.5 h-3.5 border border-gray-500 rounded-sm focus:ring-1 focus:ring-offset-1">
            <span class="text-sm text-gray-500 mr-2 group-hover:text-blue-600">{{ __('jump to empty test') }}</span>
        </label>
    </div>

    <div class="hidden text-xs bg-yellow-50 border border-yellow-200 rounded p-4" role="alert" id="sync_alert">
        <p class="text-gray-700 font-semibold mb-2">ارتباط شما با سرور قطع شده است!</p>
        <ul class="mt-4 pr-2 text-gray-600">
            <li class="mt-2">شما می‌توانید بدون مشکل به کار خود ادامه دهید</li>
            <li class="mt-1">سیستم به صورت خودکار این ارتباط را بررسی می‌کند و در صورت اتصال گزینه‌های پاسخ‌داده شده را ذخیره می‌کند</li>
            <li>
                اگر تا انتهای نمونه‌گیری ارتباط شما برقرار نشد طبق مراحل زیر عمل کنید:
                <ol class="mt-2 pr-2">
                    <li>
                        - بر روی <a href="" class="text-blue-600 hover:text-blue-700 direct" id="download">دریافت فایل تست</a> کلیک کنید
                    </li>
                    <li class="mt-1">
                        - فایل دانلودی را پیش خود نگه‌داری کنید
                    </li>
                    <li class="mt-1">
                        - فایل را به صورت دستی به روان‌شناس یا اپراتور مرکز مشاوره تحویل داده یا مستقیما در پنل کاربری خود بارگزاری کنید
                    </li>
                </ol>
            </li>
        </ul>
    </div>
</div>