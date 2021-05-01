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
        {{-- <div class="inline-block">
            <button class="w-6 h-w-6 rounded-full focus" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}"><i class="relative top-0.5 fal fa-edit text-sm text-gray-600 hover:text-blue-600"></i></button>
        </div> --}}
    </td>
</tr>

{{-- <tr data-xhr="transaction-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">{{ $loop->index + 1 }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input placeholder="{{ $item->title }}" type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 text-xs text-gray-600 h-8 w-full rounded px-2 focus:border-brand focus">
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 text-right dir-ltr en cursor-default">{{ $item->action->id }}</span>
        </div>
    </td>
    <td class="p-3 whitespace-nowrap">
        <div>
            <select id="Debtor" name="Debtor" class="border border-gray-500 h-8 rounded pl-4 pr-8 w-full text-xs focus:border-brand focus">
                <option value="">مرکز مشاوره طلیعه سلامت</option>
                <option value="">مرکز مشاوره ریسلو</option>
            </select>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div>
            <select id="Debtor" name="Debtor" class="border border-gray-500 h-8 rounded pl-4 pr-8 w-full text-xs focus:border-brand focus">
                <option value="">صندوق نقدی مرکز طلیعه سلامت</option>
            </select>
        </div>
    </td>
    <td class="p-3 whitespace-nowrap">
        <div>
            <input type="number" placeholder="@amount($item->amount)" name="amount" id="amount" autocomplete="off" class="border border-gray-500 h-8 rounded px-2 w-full text-xs focus:border-brand focus">
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-2">
            <button class="w-6 h-w-6 rounded-full focus-current ring-red-600" title="{{ __('Cancel') }}" aria-label="{{ __('Cancel') }}"><i class="relative top-1 fal fa-times text-gray-600 hover:text-red-600"></i></button>
        </div>
        <div class="inline-block">
            <button type="submit" class="w-6 h-w-6 rounded-full focus-current ring-green-600" title="{{ __('Save changes') }}" aria-label="{{ __('Save changes') }}"><i class="relative top-1 fal fa-check text-gray-600 hover:text-green-600"></i></button>
        </div>
    </td>
</tr> --}}
