<tr data-xhr="transaction-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default en">{{ $transaction->id }}</span>
        </div>
    </td>
    {{-- <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center">
            <div class="flex">
                <a href="#" class="text-xs text-gray-600 hover:text-blue-600 transition underline">{{ dd($transaction) }}</a>
            </div>
            <div class="flex">
                <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition underline mt-1 variable-font-light">محمدعلی نخلی</a>
            </div>
        </div>
    </td> --}}
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">@time($transaction->created_at,'%A %d %B %y ، ساعت H:i')</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        @isset($transaction->billing)
            <div class="flex items-center">
                <span class="text-xs text-gray-600 cursor-default relative top-0.5">
                    {{ $transaction->billing->id }} {{ $transaction->billing->title }}
                </span>
            </div>
        @endisset
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">{{ number_format($transaction->credit) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">{{ number_format($transaction->debt) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($transaction->balance < 0)
                <span class="text-xs text-red-600 block cursor-default relative top-0.5">@lang(':amount T', ['amount' => '('.number_format($transaction->balance).')'])</span>
            @elseif($transaction->balance > 0)
                <span class="text-xs text-green-600 block cursor-default relative top-0.5">@lang(':amount T', ['amount' => number_format($transaction->balance)])</span>
            @else
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">0</span>
            @endif
        </div>
    </td>
</tr>
