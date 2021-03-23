<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Attachment') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Description') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Notic') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($documents as $document)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $document->id }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">{{ $document->title }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                @if ($document->getRelationValue('attachments'))
                                <a href="{{ $document->attachments->get('original')->url }}"><i class="fal fa-download text-smleading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                @else
                                <span class="text-xs text-gray-700 cursor-default">{{ __('No attachment') }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($document->status)) }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ $document->description }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">{{ $document->notic }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                            <div class="inline-flex">
                                @if ($document->status == 'verified')
                                <a href="{{ route('dashboard.documents.update', $document->id) }}" data-xhrBase="raw" data-name="status" data-value="unverified" data-method="PUT" title="{{ __('Unverify') }}" class="block px-4 py-1 text-xs text-gray-600 border border-gray-600 hover:bg-gray-50 rounded-full">{{ __('Unverify') }}</a>
                                @else
                                <a href="{{ route('dashboard.documents.update', $document->id) }}" data-xhrBase="raw" data-name="status" data-value="verified" data-method="PUT" title="{{ __('Verify') }}" class="block px-4 py-1 text-xs text-green-600 border border-green-600 hover:bg-green-50 rounded-full">{{ __('Verify') }}</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>