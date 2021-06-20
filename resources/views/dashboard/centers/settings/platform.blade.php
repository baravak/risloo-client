<div class="bg-gray-50 p-4 rounded mb-4 platform-card" data-xhr="platform-{{ $platform->id }}">
    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('dashboard.center.setting.session-platforms.edit', [$center->id, $platform->id]) }}" class="flex items-center justify-center text-gray-700 hover:text-white transition text-sm border border-gray-300 hover:border-brand hover:bg-brand w-6 h-6 rounded-full">
            <i class="fal fa-pen text-xs"></i>
        </a>
        <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
            <input {{ $platform->available ? 'checked' : "" }} type="checkbox" name="{{ 'available' }}" id="{{ 'available-'.$platform->id }}" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer lijax platform-available-input" data-method="PUT" data-action="{{ route('dashboard.center.setting.session-platforms.update', ['center' => $center->id, 'platform' => $platform->id]) }}" data-xhrBase="inline"/>
            <label for="{{ 'available-'.$platform->id }}" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
        </div>
    </div>
    <div class="platform-detail {{ $platform->available ? '' : 'opacity-40' }}">
        <div class="flex items-center cursor-default mb-2">
            <h3 class="text-sm text-gray-800 variable-font-semibold">{{ $platform->title }}</h3>
            <span class="mr-2 text-xs text-gray-600">(@lang($platform->type))</span>
        </div>
        @if ($platform->identifier)
            <div class="mb-3">
                @if ($platform->identifier_type =='phone')
                    <a href="tel:{{ $platform->identifier }}" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition">
                        <i class="fal fa-phone ml-2"></i>
                        <span class="underline">{{ $platform->identifier }}</span>
                    </a>
                    @elseif($platform->identifier_type =='uri')
                        <a href="{{ $platform->identifier }}" class="flex items-center text-sm text-gray-600 hover:text-blue-600 transition">
                            <i class="fal fa-link ml-2"></i>
                            <span class="underline">{{ $platform->identifier }}</span>
                        </a>
                    @else
                        <div class="flex items-center text-sm text-gray-500 cursor-default">
                            <i class="fal fa-file-alt ml-2 pb-1"></i>
                            <span>{{ $platform->identifier }}</span>
                        </div>
                    @endif
                </div>
            @endif
        <div>
            <label class="inline-flex items-start group">
                <input {{ $platform->selected ? 'checked' : "" }} type="checkbox" name="selected" id="selected-{{ $platform->id }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1 lijax"  data-method="PUT" data-action="{{ route('dashboard.center.setting.session-platforms.update', ['center' => $center->id, 'platform' => $platform->id]) }}" data-xhrBase="inline">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض در ساخت جلسه درمانی انتخاب شود.')</span>
            </label>
        </div>
    </div>
</div>
