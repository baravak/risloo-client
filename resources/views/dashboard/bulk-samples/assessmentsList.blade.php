<div class="mb-4 mt-8">
    <h3 class="heading" data-total="({{ $bulkSample->scales->count() }})" data-xhr="total">{{ __('Assessments') }}</h3>
</div>

<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-300 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Edition') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Version') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($bulkSample->scales as $scale)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $scale->id }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $scale->title }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $scale->edition }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ $scale->version }}</span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
