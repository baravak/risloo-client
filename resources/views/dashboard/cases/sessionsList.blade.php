<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Time') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Session duration') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($case->sessions as $session)
                        <tr>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $session->id }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default">@time($session->started_at, '%A %d %B %y ساعت H:i')</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default">{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($session->status)) }}</span>
                                    {{-- <span class="text-xs text-red-500 cursor-default">لغو شده توسط مراجع</span>
                                    <span class="text-xs text-green-500 cursor-default">در جلسه</span>
                                    <span class="text-xs text-gray-500 cursor-default">پایان یافته</span> --}}
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                @can('manager', $case)
                                    <div class="inline-block mr-4">
                                        <a href="{{ $session->route('show') }}" alt="{{ __('View') }}"><i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
                                    </div>
                                    <div class="inline-block">
                                        <a href="{{ $session->route('edit') }}" alt="{{ __('Edition') }}"><i class="fal fa-edit text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
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
