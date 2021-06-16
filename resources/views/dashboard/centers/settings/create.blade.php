<form class="w-full mt-6" action="" method="POST">
    <div class="p-4 border border-gray-300 rounded">
        <div class="flex justify-end items-center mb-4">
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                <input checked type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                <label for="toggle" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
        <div class="">
            <div class="flex mb-2 relative">
                <input type="text" name="title" id="title" placeholder="@lang('Title')" class="flex-1 border border-gray-500 h-10 rounded px-4 pl-32 w-full text-sm focus:border-brand focus placeholder-gray-400">
                <select name="" id="" class="absolute left-1 top-1 bg-gray-100 border-gray-100 h-8 rounded text-xs focus:ring-1 focus:ring-offset-0 w-28">
                    <option disabled selected value="">نوع جلسه</option>
                    <option value="">حضوری</option>
                    <option value="">غیرحضوری</option>
                </select>
            </div>
            <div class="flex relative">
                <input type="text" name="title" id="title" placeholder="آدرس اینترنتی، شماره تماس یا متن را وارد نمایید" class="flex-1 border border-gray-500 h-10 rounded px-4 pl-32 w-full text-sm focus:border-brand focus placeholder-gray-400">
                <select name="" id="" class="absolute left-1 top-1 bg-gray-100 border-gray-100 h-8 rounded text-xs focus:ring-1 focus:ring-offset-0 w-28">
                    <option disabled selected value="">نوع مقدار</option>
                    <option value="">آدرس اینترنتی</option>
                    <option value="">شماره تماس</option>
                    <option value="">متن</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <label class="inline-flex items-start group">
                <input type="checkbox" name="default" id="default" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض برای اتاق درمان و جلسه درمانی فعال باشد.')</span>
            </label>
        </div>
    </div>

    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition focus" title="{{ __('Submit') }}" aria-label="{{ __('Submit') }}" role="button">
        {{ __('Submit') }}
    </button>
    <button type="button" class="text-gray-500 hover:text-gray-700 text-sm px-4 mr-2 h-8 rounded-full transition focus" title="{{ __('Cancel') }}" aria-label="{{ __('Cancel') }}" role="button">
        {{ __('Cancel') }}
    </button>
</form>