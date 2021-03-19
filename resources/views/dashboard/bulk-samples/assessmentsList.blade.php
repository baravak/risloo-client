<div class="mb-4 mt-8">
    <h3 class="heading" data-total="(3)" data-xhr="total">{{ __('Assessments') }}</h3>
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
                    {{-- @foreach ($assessments as $assessment) --}}
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">$YMQ-93</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">پرسشنامه 16 عاملی شخصیت کتل ویرایش طلیعه سلامت (4)</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">طلیعه سلامت</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">4</span>
                            </div>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">$Raven-9Q</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">آزمون ریون کودکان (5)</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">کودکان</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">5</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">$SCL90-93</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default">آزمون چک‌لیست نشانه‌های روانی (1)</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-700 cursor-default"></span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div claas="flex items-center">
                                <span class="text-xs text-gray-500 cursor-default">1</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>