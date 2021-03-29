<div class="mt-4">
    <label class="inline-flex items-center group">
        <input type="checkbox" id="ch-opens-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('Opens at')</span>
    </label>
    <input type="text" readonly id="opens-at-picker" dpicker-time="true" data-picker-alt="opens-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
    <input type="hidden" name="opens-at" id="opens-at">
</div>

<div class="mt-4" id="closed-at-input">
    <label class="inline-flex items-center group">
        <input type="checkbox" id="ch-closed-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('Closed at')</span>
    </label>
    <input type="text" readonly id="closed-at-picker" dpicker-time="true" data-picker-alt="closed-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
    <input type="hidden" name="closed-at" id="closed-at">
</div>

<div class="mt-4">
    <label for="field" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('محور جلسه') <span class="text-xs text-gray-600 font-light mr-1" id="field_count"></span></label>
    <select class="select2-select placeholder-gray-300" data-tags="true" data-placeholder="@lang('فیلد را تایپ کنید و روی نوشته کلیک کنید یا دکمه تب را بزنید')" multiple name="field[]" id="field">
    </select>
    <div class="flex items-center text-xs text-gray-400 mt-1">
        <i class="fal fa-info-circle ml-1"></i>
        <span>@lang('می‌توانید تعدادی از فیلدهای درمانی را ثبت کنید و در قسمت «پرداخت» برای هرکدام قیمتی مشخص کنید')</span>
    </div>
</div>

<div class="mt-4">
    <label for="description" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('توضیحات')</label>
    <textarea type="text" id="description" name="description" class="border border-gray-500 placeholder-gray-300 h-20 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left"></textarea>
</div>
