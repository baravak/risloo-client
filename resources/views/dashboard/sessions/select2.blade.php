@foreach ($sessions as $session)
    <div data-id="{{ $session->id }}">
        <div data-selection class="flex flex-col text-xs cursor-pointer pt-1">
            <div class="inline-flex">
                <span class="font-semibold text-gray-800">{{ $session->id }}</span>
                <span class="mr-1 text-gray-600 font-normal">({{ __(ucfirst($session->status)) }})</span>
            </div>
            <div class="inline-flex text-gray-500 font-light">
                <span class="sm:hidden">@time($session->started_at, 'Y.m.d / س H:i /')</span>
                <span class="hidden sm:block">@time($session->started_at, '%A Y.m.d / ساعت H:i /')</span>
                <span class="mr-1 sm:hidden">{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
                <span class="mr-1 hidden sm:block">به مدت {{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
            </div>
        </div>
    </div>
@endforeach