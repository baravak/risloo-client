<div class="mb-4 mt-8">
    <h3 class="heading" data-total="(140)" data-xhr="total">{{ __('Samples') }}</h3>
</div>

<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-300 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Case') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">$X1HQUH2PY</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <div class="flex"><span class="text-xs font-medium text-gray-700 cursor-default">آزمون تیپ‌نمای مایرز-بریگز</span></div>
                                {{-- <div class="flex mt-1"><span class="text-gray-400 font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span></div> --}}
                                <div class="flex mt-1"><span class="text-gray-400 font-light text-xs">ویرایش فرم ۸۷سؤالی - نسخه 2</span></div>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                {{-- @if ($sample->client)
                                    <span href="#" class="text-xs text-gray-700 cursor-default">@displayName($sample->client)</span>
                                    @else
                                    <span href="#" class="text-xs text-gray-700 cursor-default">{{ $sample->code }}</span>
                                    @endif --}}
                                <a href="#" class="text-xs text-gray-700 hover:text-brand">سید صادق موسوی</a>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <div class="flex"><a href="#" class="text-xs text-gray-700 hover:text-blue-500">RS96666DF</a></div>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">بازنشده</span>
                            </div>
                        </td>
                        <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
                            <div class="inline-block mr-4">
                                <a href="#"><i class="fal fa-eye text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                            </div>
                            <div class="inline-block">
                                <a href="#" target="_blank" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">انجام آزمون</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>