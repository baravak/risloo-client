@foreach ($cases as $case)
    <div data-id="{{ $case->id }}">
        <div data-selection>
            <div class="text-sm">{{ $case->id }}</div>
            <div class="text-xs">{{ $case->clients->pluck('name')->join(', ') }}</div>
        </div>

        <div data-xhr="case-clients">
            @foreach ($case->clients as $client)
                <label class="block mt-2 group">
                    <input type="checkbox" name="client_id[]" value="{{ $client->id }}" class="w-3.5 h-3.5 align-middle border border-gray-500 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
                    <span class="text-sm text-gray-500 mr-2 group-hover:text-blue-600">{{ $client->name }}</span>
                </label>
            @endforeach
        </div>
    </div>
@endforeach
