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
    <label for="time" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Time')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(ساعت-دقیقه)</span>
    <input type="time" id="time" name="time" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <label for="duration" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Session duration')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(ساعت-دقیقه)</span>
    <input type="number" id="duration" name="duration" step="5" min="30" max="120" value="45" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <input type="radio" id="repeat-status-weeks" name="repeat_status" value="weeks" checked>
    <label for="repeat-status-weeks" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Repeat')</label>
    <span class="text-xs text-gray-600 font-light mr-1">(هفته)</span>
    <input type="number" placeholder="1" min="1" max="10" step="1" value="1" id="repeat" name="repeat" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>
<div class="mt-4">
    <input type="radio" id="repeat-status-range" name="repeat_status" value="range">
    <label for="repeat-status-range" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('بازه زمانی')</label>
</div>
<div id="repeat-range">
    <div class="mt-1">
        <label for="repeat-from-picker" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Start time')</label>
        <input type="text" readonly id="repeat-from-picker" data-picker-alt="repeat-from" dpicker-format="YYYY/MM/DD" value="{{ time() - (60 * 60 * 24) }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
        <input type="hidden" name="repeat_from" id="repeat-from">
    </div>

    <div class="mt-4">
        <label for="repeat-to-picker" class="block mb-2 text-sm text-gray-700 font-medium">@lang('End time')</label>
        <input type="text" readonly id="repeat-to-picker" data-picker-alt="repeat-to" dpicker-format="YYYY/MM/DD" value="{{ time() - (60 * 60 * 24) }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
        <input type="hidden" name="repeat_to" id="repeat-to">
    </div>
</div>
