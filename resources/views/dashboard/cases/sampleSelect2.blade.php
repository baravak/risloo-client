@foreach ($cases as $case)
    <span data-id="{{ $case->id }}">
        <span data-selection>
            <div>{{ $case->id }}</div>
            <div>{{ $case->clients->pluck('user.name')->join(', ') }}</div>
        </span>
        <div data-xhr="case-clients">
            @foreach ($case->clients as $client)
                <div>{{ $client->user->name }}</div>
            @endforeach
        </div>
    </span>
@endforeach
