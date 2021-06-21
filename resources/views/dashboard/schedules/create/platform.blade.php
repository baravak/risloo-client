@isset($session)
    @foreach ($session->session_platforms ?: [] as $sPlatform)
    @php
        $platform = $room->session_platforms->where('id', $sPlatform->id)->first();
    @endphp
    <div class="bg-gray-50 p-4 rounded mb-2 platform-card">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center cursor-default">
                <h3 class="text-sm text-gray-800 variable-font-semibold">{{ $platform->title }}</h3>
                <span class="mr-2 text-xs text-gray-600">(@lang($platform->type))</span>
            </div>
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                <input checked type="checkbox" name="platforms[{{ $platform->id }}]" id="selected-{{ $platform->id }}" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer platform-available-input"/>
                <label for="selected-{{ $platform->id }}" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
        <div class="flex items-center cursor-pointer platform-detail">
            <input {{ $sPlatform->pin ? 'disabled' : '' }} type="text" name="identifier_platform[{{ $platform->id }}]" id="identifier-{{ $platform->id }}" value="{{ $sPlatform->identifier }}" class="{{ $sPlatform->pin ? 'opacity-60' : '' }} flex-1 border border-gray-500 w-full h-8 rounded px-4 text-sm focus:border-brand focus placeholder-gray-400 text-gray-500">
            <label class="inline-flex items-center group h-8 px-2 border border-gray-500 rounded mr-1">
                <input {{ $sPlatform->pin ? 'checked' : '' }} type="checkbox" name="pin_platform[{{ $platform->id }}]" id="pin-{{ $platform->id }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1 platform-pin-input">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('اتصال به اتاق')</span>
            </label>
        </div>
    </div>
    @endforeach
@endisset
@foreach ($room->session_platforms ?: [] as $platform)
@php
    if(isset($session) && $session->session_platforms && $session->session_platforms->where('id', $platform->id)->first()) continue;
@endphp
<div class="bg-gray-50 p-4 rounded mb-2 platform-card">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center cursor-default">
                <h3 class="text-sm text-gray-800 variable-font-semibold">{{ $platform->title }}</h3>
                <span class="mr-2 text-xs text-gray-600">(@lang($platform->type))</span>
            </div>
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                <input {{ !isset($session) && $platform->selected ? 'checked' : '' }} type="checkbox" name="platforms[{{ $platform->id }}]" id="selected-{{ $platform->id }}" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer platform-available-input"/>
                <label for="selected-{{ $platform->id }}" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
        <div class="flex items-center cursor-pointer platform-detail {{ !isset($session) && $platform->selected ? '' : 'opacity-40' }}">
            <input disabled type="text" name="identifier_platform[{{ $platform->id }}]" id="identifier-{{ $platform->id }}" value="{{ $platform->identifier }}" class="opacity-60 flex-1 border border-gray-500 w-full h-8 rounded px-4 text-sm focus:border-brand focus placeholder-gray-400 text-gray-500">
            <label class="inline-flex items-center group h-8 px-2 border border-gray-500 rounded mr-1">
                <input checked type="checkbox" name="pin_platform[{{ $platform->id }}]" id="pin-{{ $platform->id }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1 platform-pin-input">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('اتصال به اتاق')</span>
            </label>
        </div>
    </div>
@endforeach
