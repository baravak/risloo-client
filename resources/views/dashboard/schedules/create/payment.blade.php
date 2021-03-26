<div class="mt-4">
    <label for="status" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع دریافت')</label>
    <select id="status" name="status" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="online">@lang('آنلاین')</option>
        <option value="cache">@lang('نقدی')</option>
    </select>
</div>

<div class="mt-4">
    <label for="amount" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('مبلغ جلسه')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(تومان)</span>
    <input type="number" id="amount" name="amount" step="100" min="1000"  class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>
