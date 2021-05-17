<div>
    <div class="relative mb-4">
        <div class="mb-4">
            <h2 class="heading" data-total="({{ $case->clients ? $case->clients->count() : 0 }})">{{ __('Clients') }}</h2>
        </div>
        @can('manager', $case)
            <div>
                <a href="{{route('dashboard.case.users.create', $case->id)}}" class="absolute -top-0 left-0 flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-9 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                    <i class="fal fa-plus ml-2"></i>
                    <span class="font-medium">{{ __('Add client') }}</span>
                </a>
            </div>
        @endcan
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-2">
        @foreach ($case->clients ?: [] as $client)
            <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $client->id]) }}" class="client-record flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition" data-xhr="client-{{ $client->id }}" data-id="{{ $client->id }}">
                <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                    {{-- @avatarOrName($client) --}}
                </div>
                <div class="flex items-center">
                    <span class="font-medium text-sm text-gray-700">@displayName($client)</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
