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
                    @foreach ($case->samples as $sample)
                    <tr class="sample-record" data-xhr="sample-{{ $sample->id }}" data-session="{{ $sample->session_id }}" data-client="{{ $sample->client ? $sample->client->id : null }}">
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="block text-xs font-medium text-gray-700 cursor-default">{{ $sample->title }}</span>
                                {{-- <span class="block text-gray-400 font-light text-xs">ویرایش دکتر هخامنشیان - نسخه 1</span> --}}
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->session_id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $sample->client->id]) }}" class="text-xs text-gray-700">
                                    {{ $sample->client->name }}
                                </a>
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
