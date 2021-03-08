<div data-panel="close" class="hidden">
    <div id="close">
        <div>
            <h2 class="font-medium text-lg mb-2">{{ __('End sample') }}</h2>
            <p class="text-gray-700 mt-4">اگر از اتمام نمونه مطمئن هستید و به تمامی گزینه‌ها پاسخ داده‌اید می‌توانید دکمه اتمام نمونه را بزنید. بعد از زدن این دکمه، دیگر قادر به ویرایش نمونه نمی‌باشید</p>
        </div>
        <div class="close-btn">
            <p class="text-gray-700 mt-2">اگر با خطا مواجه شدید، بر روی دریافت نمونه بزنید و فایل دریافتی را به روان‌شناس یا اپراتور مرکزمشاوره تحویل دهید</p>
            <div class="mt-4">
                <a class="inline-flex justify-center items-center h-9 px-6 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition" href="{!! urldecode(route('samples.close', substr($sample->id, 1))) !!}" data-method="PUT" data-lijax>
                    {{ __('Check out sample') }}
                </a>
                <a href="" id="download-close" class="inline-flex justify-center items-center h-9 px-6 border border-brand text-brand text-sm rounded-full hover:bg-blue-50 transition mr-2">
                    {{ __('Download sample file') }}
                </a>
            </div>
        </div>
    </div>
</div>
