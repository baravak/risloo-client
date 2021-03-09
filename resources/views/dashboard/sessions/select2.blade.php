@foreach ($sessions as $session)
    <div data-id="{{ $session->id }}">
        <div data-selection class="flex justify-between items-center text-xs">
            <div>
                <div class="font-bold">{{ $session->id }}</div>
                <div>@time($session->started_at, '%A %d %B %y ساعت H:i')</div>
            </div>
            <span>{{ __(ucfirst($session->status)) }}</span>
        </div>
    </div>
@endforeach