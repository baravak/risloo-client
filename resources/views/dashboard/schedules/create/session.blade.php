<div class="mt-4">
    <label for="status" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Status')</label>
    <select id="status" name="status" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="draft">@lang('Draft')</option>
        <option value="open">@lang('Open')</option>
    </select>
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
