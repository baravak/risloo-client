<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Session') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($case->samples as $samples)
                    <tr>
                        <td class="p-3 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $samples->id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="block text-xs font-medium text-gray-700 cursor-default">{{ $samples->title }}</span>
                                {{-- <span class="block text-gray-400 font-light text-xs">ویرایش دکتر هخامنشیان - نسخه 1</span> --}}
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $samples->session_id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $samples->client->name }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($samples->status)) }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap text-left dir-ltr">
                            <div class="inline-block mr-4">
                                {{-- <x-link-show :link="$sample->route('show')"/> --}}
                            </div>
                            <div class="inline-block">
                                <a href="#" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Do sample') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>