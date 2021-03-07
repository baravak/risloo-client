@foreach ($sessions as $session)
    <div data-id="{{ $session->id }}">
        <div data-selection>
            <div>{{ $session->id }}</div>
            <div>@time($session->started_at, '%A %d %B %y ساعت H:i')</div>
            <div>{{ __(':time minute(s)', ['time' => $session->duration]) }}</div>
            <div>{{ __(ucfirst($session->status)) }}</div>
        </div>
    </div>
@endforeach
