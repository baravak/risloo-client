<tr data-xhr="transaction-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">{{ $loop->index + 1 }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">{{ $item->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 text-right dir-ltr en cursor-default">{{ $item->action->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center">
            <div class="flex">
                <a href="#" class="text-xs text-gray-600 hover:text-blue-600 transition underline">{{ $item->debtor->title }}</a>
            </div>
            @if ($item->debtor->user)
                <div class="flex">
                    <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition underline mt-1 variable-font-light">{{ $item->debtor->user->name }}</a>
                </div>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col justify-center">
            <div class="flex">
                <a href="#" class="text-xs text-gray-600 hover:text-blue-600 transition underline">{{ $item->creditor->title }}</a>
            </div>
            @if ($item->creditor->user)
                <div class="flex">
                    <a href="#" class="text-xs text-gray-500 hover:text-blue-600 transition underline mt-1 variable-font-light">{{ $item->creditor->user->name }}</a>
                </div>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">@amount($item->amount) تومان</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block">
            <a href="#" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
    </td>
</tr>
