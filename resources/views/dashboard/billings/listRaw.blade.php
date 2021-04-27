<tr data-xhr="billing-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default en">{{ $billing->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5 variable-font-semibold">@amount($billing->amount)</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $billing->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">@time($billing->created_at,'%A %d %B %y - ساعت H:i')</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center text-xs">
            <div class="flex">
                @if ($billing->debtor->user)
                    <a href="{{ route('dashboard.center.users.show', ['center' => $billing->debtor->center->id, 'user' => $billing->debtor->user->id]) }}" class="text-red-600 hover:text-red-800 underline">
                        {{  $billing->debtor->user->name }} - {{ $billing->debtor->title }}
                    </a>
                    @else
                        <span class="text-red-600">
                            {{ $billing->debtor->title }}
                        </span>
                    @endif
            </div>
            <div class="flex mt-1">
                @if ($billing->creditor->user)
                    <a href="{{ route('dashboard.center.users.show', ['center' => $billing->creditor->center->id, 'user' => $billing->creditor->user->id]) }}" class="text-green-600 hover:text-green-800 underline">
                        {{  $billing->creditor->user->name }} - {{ $billing->creditor->title }}
                    </a>
                    @else
                        <span  class="text-green-600">
                        {{ $billing->creditor->title }}
                        </span>
                    @endif
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">@lang($billing->type)</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-2">
            <x-link-show :link="route('dashboard.billings.show', $billing->id)"/>
            {{-- <a href="#" title="نمایش" aria-label="نمایش"><i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a> --}}
        </div>
        {{-- <div class="inline-block">
            <a href="#" class="inline-block px-3 py-1 text-xs text-brand hover:text-white border border-brand hover:bg-brand rounded-full transition">{{ __('Payment') }}</a>
        </div> --}}
    </td>
</tr>
