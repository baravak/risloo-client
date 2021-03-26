<div class="mt-4">
    <label for="week_day" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Week days')</label>
    <select id="week_day" name="week_day[]" multiple class="border border-gray-500 h-44 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="sat">@lang('Saturday')</option>
        <option value="sun">@lang('Sunday')</option>
        <option value="mon">@lang('Monday')</option>
        <option value="tue">@lang('Tuesday')</option>
        <option value="wed">@lang('Wednesday')</option>
        <option value="thu">@lang('Thursday')</option>
        <option value="fri">@lang('Friday')</option>
    </select>
</div>
<div class="mt-4">
    <label for="repeat" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Repeat')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(هفته)</span>
    <input type="number" placeholder="1" min="1" max="10" step="1" value="1" id="repeat" name="repeat" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <label for="time" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Time')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(ساعت-دقیقه)</span>
    <input type="time" id="time" name="time" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <label for="duration" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Session duration')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(ساعت-دقیقه)</span>
    <input type="number" id="duration" name="duration" step="5" min="30" max="120" value="45" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>
