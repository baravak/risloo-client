<div class="mt-4">
    <label for="status" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Status')</label>
    <select id="status" name="status" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="draft">@lang('Draft')</option>
        <option value="open">@lang('Open')</option>
    </select>
</div>

<div class="mt-4">
    <label for="field" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('حیطه جلسه')</label>
    <input type="text" id="field" name="field" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <label for="description" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('توضیحات')</label>
    <textarea type="text" id="description" name="description" class="border border-gray-500 placeholder-gray-300 h-20 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left"></textarea>
</div>
