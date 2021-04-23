<div>
    <div class="mb-4">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Clients') }}</span>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{$session->clients ? $session->clients->whereIn('position', ['client'])->count() : 0}})</span>
        </h3>
    </div>
    <div class="grid grid-cols-1 2xl:grid-cols-2 gap-2">
        @foreach ($session->clients ? $session->clients->whereIn('position', ['client']): [] as $client)
        <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $client->id]) }}" class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition">
            <div class="flex items-center">
                <div class="font-medium text-sm text-gray-700">@displayName($client)</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
