<div data-xhr="sample-items">
    @if ($bulkSamples->count())
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr class="cursor-default">
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Therapy center') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Therapy room') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Case') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Users') }}</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($bulkSamples as $bulkSample)
                            @include('dashboard.bulk-samples.listRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{method_exists($bulkSamples, 'links') ? $bulkSamples->links() : null}}
    @else
    @include('dashboard.bulk-samples.emptyList')
    @endif
</div>
