@foreach ($sessions as $session)
    <div data-id="{{ $session->id }}">
        <div data-selection class="flex flex-col text-xs cursor-pointer pt-1">
            <div class="font-semibold text-gray-700">{{ $session->id }}</div>
            <div class="inline-flex text-gray-500 font-light">
                <span class="sm:hidden">@time($session->started_at, 'Y.m.d - H:i')</span>
                <span class="hidden sm:block">@time($session->started_at, '%A %d %B %y ساعت H:i')</span>
                <span class="mx-1">-</span>
                <span>{{ __(ucfirst($session->status)) }}</span>
            </div>
        </div>
    </div>
@endforeach