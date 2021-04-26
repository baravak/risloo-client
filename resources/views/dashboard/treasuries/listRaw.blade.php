<tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $treasury->id }}</span>
        </div>
    </td>
    {{-- <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $treasury->symbol }}</span>
        </div>
    </td> --}}
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default">
                {{ $treasury->title }}
                @if ($treasury->user)
                <br>
                    {{ $treasury->user->name }}
                @endif
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        @if ($treasury->creditable)
            <div class="flex items-center text-xs text-gray-600 cursor-default">
                <i class="fal fa-badge-check ml-1"></i>
                <span>معتبر</span>
            </div>
        @else
            <div class="flex items-center text-xs text-gray-600 cursor-default">
                <span>نامعتبر</span>
            </div>
        @endif
    </td>
    {{-- <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <a href="#" class="text-xs text-gray-600 hover:text-brand block text-right dir-ltr">$Tra123456</a>
        </div>
    </td> --}}
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($treasury->balance == 0)
                <span class="text-xs text-gray-600 block cursor-default">0</span>
            @elseif($treasury->balance >= 0)
                <span class="text-xs text-green-600 block cursor-default">@lang(':amount T', ['amount'=> number_format($treasury->balance)])</span>
            @else
                <span class="text-xs text-red-600 block cursor-default">@lang(':amount T', ['amount'=> '('.number_format($treasury->balance).')'])</span>
            @endif
        </div>
    </td>
    <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-2">
            <a href="{{ route('dashboard.treasuries.edit',$treasury->id) }}" aria-label="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
        </div>
        <div class="inline-block mr-1">
            <a href="#" class="inline-block px-3 py-1 text-xs text-gray-500 hover:text-green-600 border border-gray-500 hover:border-green-600 rounded-full transition">{{ __('Increase credit') }}</a>
        </div>
        <div class="inline-block">
            <a href="{{ route('dashboard.treasuries.show',$treasury->id) }}" class="inline-block px-3 py-1 text-xs text-gray-500 hover:text-brand border border-gray-500 hover:border-brand rounded-full transition">{{ __('Transactions') }}</a>
        </div>
    </td>
</tr>
