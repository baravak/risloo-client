<div>
    @if ($users && $users->count())
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-gray-200 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('User') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Creator') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Position') }} / {{ __('Status') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Accepted_at') }}</th>
                                <th class="px-3 py-2" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                @include('dashboard.room-users.listRaw')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $users->links() }}

    @else
        @include('dashboard.room-users.emptyList')
    @endif
</div>