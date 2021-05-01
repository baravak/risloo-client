<tr data-xhr="transaction-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 text-right dir-ltr cursor-default en">{{ $payment->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5 variable-font-semibold">@lang(':amount T', ['amount' => number_format($payment->amount)])</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center">
            <div class="flex">
                <a href="{{ route('dashboard.treasuries.show', $payment->treasury->id) }}" class="text-xs text-gray-600 hover:text-blue-600 transition underline">{{ $payment->treasury->title }}</a>
            </div>
            {{-- {{ dd($payment->treasury) }}
            @if (auth()->isAdmin())
                <div class="flex">
                    <a href="{{ route('dashboard.users.show', $payment->treasury->user->id) }}" class="text-xs text-gray-500 hover:text-blue-600 transition underline mt-1 variable-font-light">{{ $payment->treasury->user->name }}</a>
                </div>
            @endif --}}
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center relative top-0.5">
            <span class="text-xs text-gray-600 block cursor-default">@time($payment->created_at, '%A %d %B %y ، ساعت H:i')</span>
            @if ($payment->status == 'awaiting')
                <span class="text-xs text-gray-400 block cursor-default variable-font-light">
                    منقضی می‌شود در @time($payment->expires_at,'%A %d %B %y ، ساعت H:i')
                </span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @switch($payment->status)
                @case('awaiting')
                    <span class="text-xs text-yellow-500 block cursor-default">در انتظار پرداخت</span>
                    @break
                @case('success')
                    <span class="text-xs text-green-600 block cursor-default">موفق</span>
                    @break
                @case('fail')
                    <span class="text-xs text-red-600 block cursor-default">ناموفق</span>
                    @break
                @case('expired')
                    <span class="text-xs text-gray-600 block cursor-default">منقضی شده</span>
                    @break
            @endswitch
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">{{ $payment->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-flex">
            @if ($payment->status == 'awaiting' && time() < $payment->expires_at->timestamp)
                <a href="{{ route('auth', ['authorized_key' => $payment->authorized_key]) }}" class="block px-4 py-1 text-xs text-brand border border-brand hover:bg-brand hover:text-white rounded-full transition focus direct" title="{{ __('Payment') }}" aria-label="{{ __('Payment') }}">{{ __('Payment') }}</a>
            @endif
        </div>
    </td>
</tr>
