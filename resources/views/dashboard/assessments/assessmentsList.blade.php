<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Edition') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Version') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($assessments as $assessment)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $assessment->id }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $assessment->title }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $assessment->edition }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ $assessment->version }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                            @can('dashboard.sessions.create')
                            <div class="inline-flex">
                                <a href="{{ route('dashboard.samples.create', ['scale' => substr($assessment->id, 1)]) }}" class="block px-4 py-1 text-xs text-brand border border-brand hover:bg-blue-50 rounded-full">{{ __('Create sample') }}</a>
                            </div>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$assessments->links()}}