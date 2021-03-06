@foreach ($cases as $case)
    <div data-id="{{ $case->id }}">
        <div data-selection>
            <div>{{ $case->id }}</div>
            <div>{{ $case->clients->pluck('user.name')->join(', ') }}</div>
        </div>

        <div data-xhr="case-clients">
            @foreach ($case->clients as $client)
                <div>
                    <input type="checkbox" name="clients" value="{{ $client->id }}">
                    {{ $client->name }}
                </div>
            @endforeach
        </div>
    </div>
@endforeach