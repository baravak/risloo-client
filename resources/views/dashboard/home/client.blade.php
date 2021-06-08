<div class="flex-col xl:flex-row flex xl:items-center xl:justify-between border border-gray-300 rounded p-4">
    <div class="text-sm text-gray-700 cursor-default">شما برای حساب کاربری خود کلمه عبور تنظیم نکرده‌اید. جهت افزایش امنیت حساب کاربری، کلمه عبور تنظیم نمایید.</div>
    <div class="mt-4 xl:mt-0">
        <a href="#" target="_blank" class="px-4 py-1 text-sm text-brand hover:text-white border border-brand hover:bg-brand rounded-full transition">تنظیم کلمه عبور</a>
    </div>
</div>
<div class="flex-col xl:flex-row flex xl:items-center xl:justify-between border border-gray-300 rounded p-4 mt-4">
    <div class="text-sm text-gray-700 cursor-default">شما عضو هیچ یک از مراکز درمانی نیستید. جهت ادامه روند درمان، به یکی از مراکز درمانی موجود در ریسلو درخواست پذیرش دهید. </div>
    <div class="mt-4 xl:mt-0">
        <a href="#" target="_blank" class="px-4 py-1 text-sm text-brand hover:text-white border border-brand hover:bg-brand rounded-full transition">مراکز درمانی</a>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 2xl:grid-cols-6 gap-4 mt-4">
    <div>
        <div class="flex items-center justify-between border border-green-600 rounded p-4">
            <i class="fal fa-folder-open text-3xl text-green-600"></i>
            <div class="flex flex-col justify-center text-left cursor-default relative top-1">
                <span class="text-xs text-green-600">@lang('Cases')</span>
                <span class="text-xl text-green-700 variable-font-semibold">3</span>
            </div>
        </div>
        <a href="#" class="flex items-center justify-center border border-green-600 border-dashed rounded text-green-600 p-2 mt-2 hover:bg-green-50 transition">
            <i class="fal fa-plus text-sm ml-2"></i>
            <span class="text-sm">@lang('Create new case')</span>
        </a>
    </div>
    <div>
        <a href="#" class="flex items-center justify-between border border-red-700 rounded p-4 group hover:bg-red-700 transition">
            <i class="fal fa-user-friends text-3xl text-red-700 group-hover:text-white"></i>
            <div class="flex flex-col justify-center text-left relative top-1">
                <span class="text-xs text-red-600 group-hover:text-white">@lang('Sessions')</span>
                <span class="text-xl text-red-700 variable-font-semibold group-hover:text-white">15</span>
            </div>
        </a>
        <a href="#" class="flex items-center justify-center border border-red-600 border-dashed rounded text-red-600 p-2 mt-2 hover:bg-red-50 transition">
            <i class="fal fa-plus text-sm ml-2"></i>
            <span class="text-sm">@lang('Create new session')</span>
        </a>
    </div>
    <div>
        <a href="#" class="flex items-center justify-between border border-yellow-500 rounded p-4 group hover:bg-yellow-500 transition">
            <i class="fal fa-vial text-3xl text-yellow-500 group-hover:text-white"></i>
            <div class="flex flex-col justify-center text-left relative top-1">
                <span class="text-xs text-yellow-500 group-hover:text-white">@lang('Samples')</span>
                <span class="text-xl text-yellow-600 variable-font-semibold group-hover:text-white">8</span>
            </div>
        </a>
        <a href="#" class="flex items-center justify-center border border-yellow-500 border-dashed rounded text-yellow-500 p-2 mt-2 hover:bg-yellow-50 transition">
            <i class="fal fa-plus text-sm ml-2"></i>
            <span class="text-sm">@lang('Create new sample')</span>
        </a>
    </div>
    <div>
        <a href="#" class="flex items-center justify-between border border-brand rounded p-4 group hover:bg-brand transition">
            <i class="fal fa-vials text-3xl text-brand group-hover:text-white"></i>
            <div class="flex flex-col justify-center text-left relative top-1">
                <span class="text-xs text-brand group-hover:text-white">@lang('Bulk samples')</span>
                <span class="text-xl text-brand variable-font-semibold group-hover:text-white">2</span>
            </div>
        </a>
        <a href="#" class="flex items-center justify-center border border-brand border-dashed rounded text-brand p-2 mt-2 hover:bg-blue-50 transition">
            <i class="fal fa-plus text-sm ml-2"></i>
            <span class="text-sm">@lang('Create bulk sample')</span>
        </a>
    </div>
</div>

{{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 2xl:grid-cols-6 gap-4 mt-64">
    <div class="flex items-center justify-between border border-brand rounded p-4">
        <i class="fal fa-folder-open text-3xl text-brand"></i>
        <div class="flex flex-col justify-center text-left cursor-default relative top-1">
            <span class="text-xs text-gray-600">@lang('Cases')</span>
            <span class="text-xl text-gray-700 variable-font-semibold">3</span>
        </div>
    </div>
    <a href="#" class="flex items-center justify-between border border-brand rounded p-4 group hover:bg-brand transition">
        <i class="fal fa-user-friends text-3xl text-brand group-hover:text-white"></i>
        <div class="flex flex-col justify-center text-left relative top-1">
            <span class="text-xs text-gray-500 group-hover:text-white">@lang('Sessions')</span>
            <span class="text-xl text-gray-700 variable-font-semibold group-hover:text-white">15</span>
        </div>
    </a>
    <a href="#" class="flex items-center justify-between border border-brand rounded p-4 group hover:bg-brand transition">
        <i class="fal fa-vial text-3xl text-brand group-hover:text-white"></i>
        <div class="flex flex-col justify-center text-left relative top-1">
            <span class="text-xs text-gray-500 group-hover:text-white">@lang('Samples')</span>
            <span class="text-xl text-gray-700 variable-font-semibold group-hover:text-white">8</span>
        </div>
    </a>
    <a href="#" class="flex items-center justify-between border border-brand rounded p-4 group hover:bg-brand transition">
        <i class="fal fa-vials text-3xl text-brand group-hover:text-white"></i>
        <div class="flex flex-col justify-center text-left relative top-1">
            <span class="text-xs text-gray-500 group-hover:text-white">@lang('Bulk samples')</span>
            <span class="text-xl text-gray-700 variable-font-semibold group-hover:text-white">2</span>
        </div>
    </a>
</div> --}}