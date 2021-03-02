<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My open samples') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">(3)</span>    
        </div>
        <div>
            <a href="#" class="text-sm text-blue-700">{{ __('See all my samples') }}</a>
        </div>
    </div>

    <div>
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-gray-200 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Therapy room') }}</th>
                                <th class="px-3 py-2" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            {{-- @foreach ($samples as $sample)         --}}
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">$X1HQUFUG8</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="block text-xs font-medium text-gray-700 cursor-default">آزمون روان‌بنه‌های یانگ (YSQ)</span>
                                            {{-- <span class="block text-gray-400 font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span> --}}
                                            <span class="block text-gray-400 font-light text-xs">ویرایش پیشرفته - نسخه 5</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            {{-- <a href="#" class="text-xs text-gray-700 hover:text-blue-500">{{ __('Therapy room of :user', ['user' => $sample->room->manager->name]) }}</a> --}}
                                            <a href="#" class="text-xs text-gray-700 hover:text-blue-500">اتاق درمان سوپروایزری</a>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                        <a href="#" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Do sample') }}</a>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>