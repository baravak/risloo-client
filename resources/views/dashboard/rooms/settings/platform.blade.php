<div class="bg-gray-50 p-4 rounded mb-2 platform-card" data-xhr="platform-{{ $platform->id }}">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center cursor-default">
            <h3 class="text-sm text-gray-800 variable-font-semibold">{{ $platform->title }}</h3>
            <span class="mr-2 text-xs text-gray-600">(@lang($platform->type))</span>
        </div>
        <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
            <input @radioChecked($platform->available, true) type="checkbox" name="available" id="available-{{ $platform->id }}" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer platform-available-input lijax" data-method="PUT" data-action="{{ route('dashboard.room.setting.session-platforms.update', [$room->id, $platform->id]) }}"/>
            <label for="available-{{ $platform->id }}" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
    </div>
    <div class="platform-detail">
        <div class="flex items-center mb-4 cursor-pointer">
            <input {{ $platform->pin ? 'disabled' : '' }} type="text" name="identifier" id="identifier-{{ $platform->id }}" value="{{ $platform->identifier }}" class="opacity-60 flex-1 border border-gray-500 w-full h-8 rounded px-4 text-sm focus:border-brand focus placeholder-gray-400 text-gray-500 lijax" data-method="PUT" data-action="{{ route('dashboard.room.setting.session-platforms.update', [$room->id, $platform->id]) }}" data-lijax="change 1000">
            <label class="inline-flex items-center group h-8 px-2 border border-gray-500 rounded mr-1">
                <input @radioChecked($platform->pin, true) type="checkbox" name="pin" id="pin-{{ $platform->id }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1 platform-pin-input lijax" data-method="PUT" data-action="{{ route('dashboard.room.setting.session-platforms.update', [$room->id, $platform->id]) }}">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('اتصال به مرکز')</span>
            </label>
        </div>
        <div>
            <label class="inline-flex items-start group">
                <select name="selected_level" id="selected-level-{{ $platform->id }}" class="lijax" data-method="PUT" data-action="{{ route('dashboard.room.setting.session-platforms.update', [$room->id, $platform->id]) }}">
                <option value="1" {{ $platform->selected_level === 1 ? 'selected' : '' }}>@lang('پیشفرض مرکز') (@lang($platform->selected_default ? 'Active' : 'Deactive'))</option>
                <option value="2" {{ $platform->selected_level === 2 ? 'selected' : '' }}>@lang('فعال')</option>
                <option value="0" {{ $platform->selected_level === 0 ? 'selected' : '' }}>@lang('غیرفعال')</option>
                </select>
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض برای جلسه درمانی فعال باشد.')</span>
            </label>
        </div>
    </div>

</div>
