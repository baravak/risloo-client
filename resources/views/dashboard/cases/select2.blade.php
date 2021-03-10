@foreach ($cases as $case)
    <div data-id="{{ $case->id }}">
        <div data-selection>
            <div class="text-sm">{{ $case->id }}</div>
            <div class="text-xs">{{ $case->clients->pluck('name')->join(', ') }}</div>
        </div>
    </div>
@endforeach
