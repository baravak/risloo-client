<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Time') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Creditor') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Debtor') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Amount') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Type') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col"></th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($transactions ?: [] as $transaction)
                    <tr>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $transaction->id }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">@time($transaction->created_at, '%A %d %B %y ساعت H:i')</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-rtl cursor-default">{{ $transaction->title }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-rtl cursor-default">{{ $transaction->creditor->title }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-rtl cursor-default">{{ $transaction->debtor->title }}</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-rtl cursor-default">@lang(':amount T', ['amount' => number_format($transaction->amount) ])</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-700 block text-right dir-rtl cursor-default">@lang($transaction->type)</span>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div class="flex items-center">
                                @can('creditor', [$transaction, $center])
                                    <select name="id" data-lijax="change" data-action="{{ route('dashboard.billings.final', $transaction->id) }}" data-method="POST">
                                        <option>@lang('پرداخت شده به کیف پول ...')</option>
                                        @foreach (auth()->user()->centers->where('id', $center->id)->first()->treasuries->where('creditable', 0) as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
