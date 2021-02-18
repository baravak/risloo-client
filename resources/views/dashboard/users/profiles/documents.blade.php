<div>
    <div class="mb-4 mt-8">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Documents') }}</span>
            <span class="text-xs text-gray-600 font-light mr-2">(2)</span>
        </h3>
    </div>
    
    <div class="flex justify-between items-center flex-wrap mb-4">
        <input type="search" class="flex-1 ml-4 text-sm border border-gray-200 rounded-sm" placeholder="{{ __('Search') }}">
        <a href="#" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-10 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new document') }}">
            <i class="fal fa-plus sm:ml-2"></i>
            <span class="hidden sm:inline">{{ __('Create new document') }}</span>
        </a>
    </div>

    {{-- <div class="overflow-x-auto">
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
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $document->id }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default">{{ $document->title }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    @if ($document->getRelationValue('attachments'))
                                    <a href="{{ $document->attachments->get('original')->url }}"><i class="fal fa-download text-smleading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                    @else
                                    <span class="text-xs text-gray-700 cursor-default">{{ __('No attachment') }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($document->status)) }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-500 cursor-default">{{ $document->description }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
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
    </div> --}}
</div>


{{-- {{$documents->links()}} --}}