<div data-xhr="treasuries-items">
    @if ($treasuries->count())
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Credit') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Balance') }} <small>(تومان)</small></th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($treasuries as $treasury)
                        @include('dashboard.treasuries.listRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{method_exists($treasuries, 'links') ? $treasuries->links() : null}}
    @else
    @include('dashboard.treasuries.emptyList')
    @endif
</div>
