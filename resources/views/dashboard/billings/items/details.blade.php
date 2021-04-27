<div class="cursor-default">
    <div class="flex items-center text-gray-700">
        <i class="fal fa-file-invoice text-xl ml-2"></i>
        <h2 class="text-lg variable-font-bold">{{ $billing->title }}</h2>
    </div>
    <span class="block text-brand variable-font-medium mt-2">@amount($billing->amount) تومان</span>
    <div class="flex flex-col sm:flex-row text-sm mt-2">
        <div>
            <span class="text-xs text-gray-400 cursor-default ml-1">بدهکار</span>
            <span class="text-gray-600 transition">
                @if ($billing->debtor->user)
                <a href="{{ route('dashboard.center.users.show', ['center' => $billing->debtor->center->id, 'user' => $billing->debtor->user->id]) }}" class="hover:text-blue-600 underline">{{ $billing->debtor->user->name }}</a> - {{ $billing->debtor->title }}
            @else
                {{ $billing->debtor->title }}
            @endif
            </span>
        </div>
        <div class="sm:mr-4 mt-1 sm:mt-0">
            <span class="text-xs text-gray-400 cursor-default ml-1">بستانکار</span>
            <span class="text-gray-600 transition">
                @if ($billing->creditor->user)
                    <a href="{{ route('dashboard.center.users.show', ['center' => $billing->creditor->center->id, 'user' => $billing->creditor->user->id]) }}" class="hover:text-blue-600 underline ">{{ $billing->creditor->user->name }}</a> - {{ $billing->creditor->title }}
                @else
                    {{ $billing->creditor->title }}
                @endif
            </span>
        </div>
    </div>
</div>
<div class="flex flex-col text-right sm:text-left mt-4 sm:mt-0 cursor-default">
    <span class="text-sm text-gray-600 font-semibold dir-ltr en">{{ $billing->id }}</span>
    <span class="text-xs text-gray-500 variable-font-medium mt-2">@time($billing->created_at,'%A %d %B %y - ساعت H:i')</span>
    <span class="text-xs text-gray-400 mt-2">@lang($billing->type)</span>
</div>
