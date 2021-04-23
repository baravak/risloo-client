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
                <span>معتبر است</span>
            </div>
        @else
            <div class="flex items-center text-xs text-gray-600 cursor-default">
                <span>نامعتبر است</span>
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
    <td>
        <a href="{{ route('dashboard.treasuries.edit',$treasury->id) }}">ویرایش</a>
        |
        <a href="{{ route('dashboard.treasuries.show',$treasury->id) }}">نمایش ترانکنش‌ها</a>
    </td>
</tr>
