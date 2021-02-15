<div>
    <div class="mb-4 mt-8">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Samples') }}</span>
        </h3>
    </div>
    
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/2">
            <input type="search" placeholder="{{ __('Search') }}" class="w-full px-3 h-7 rounded border border-gray-200 font-light text-sm placeholder-gray-300">
        </div>
        <div>
            <a href="#" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                <i class="fal fa-plus ml-2"></i>
                <span class="font-medium">{{ __('Create sampel') }}</span>
            </a>
        </div>
    </div>
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
                        <tr>
                            <td class="p-3 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default"></span>
                                </div>
                            </td>
                            <td class="p-3 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="block text-xs font-medium text-gray-700 cursor-default"></span>
                                    {{-- <span class="block text-gray-400 font-light text-xs">ویرایش دکتر هخامنشیان - نسخه 1</span> --}}
                                </div>
                            </td>
                            <td class="p-3 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default"></span>
                                </div>
                            </td>
                            <td class="p-3 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default"></span>
                                </div>
                            </td>
                            <td class="p-3 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-500 cursor-default"></span>
                                </div>
                            </td>
                            <td class="p-3 whitespace-nowrap text-left dir-ltr">
                                <div class="inline-block mr-4">
                                    <a href="#"><i class="fal fa-eye text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                </div>
                                <div class="inline-block">
                                    <a href="#" class="block px-2 py-1 text-xs text-gray-700 hover:text-blue-600 border border-gray-400 hover:border-blue-600 hover:bg-blue-50 rounded-full">نمره‌دهی</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>