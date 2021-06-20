<div>
    <div class="mb-4">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('بسترهای جلسه') }}</span>
        </h3>
    </div>
    <div class="grid grid-cols-1 2xl:grid-cols-2 gap-2">
        @foreach ($session->session_platforms as $platform)
            <span class="flex items-center border border-gray-200 rounded px-3 py-2 transition">
                <div class="flex items-center">
                    <div class="font-bold text-xs text-gray-700">{{ $platform->title }} (@lang($platform->type)) : {{ $platform->identifier }}</div>
                </div>
            </span>
        @endforeach
    </div>
</div>
