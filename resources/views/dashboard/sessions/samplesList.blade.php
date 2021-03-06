<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($samples ?: [] as $sample)
                    <tr>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex flex-col justify-center cursor-default">
                                <span class="text-xs variable-font-medium text-gray-700">{{ $sample->scale->title }}</span>
                                <span class="text-gray-400 variable-font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">@displayName($sample->client)</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                @include('dashboard.samples.tables.status')
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap text-left dir-ltr">
                                @include('dashboard.samples.do')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
