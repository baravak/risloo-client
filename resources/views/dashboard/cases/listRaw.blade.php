<tr data-xhr="case-list-{{$case->id}}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $case->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="#" class="text-xs text-gray-700 hover:text-brand">نام اتاق درمان</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="#" class="text-xs text-gray-700 hover:text-brand">نام مرکز درمان</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            @foreach ($case->clients as $item)
                <a href="{{ $item->user->route('show') }}" class="inline-block text-xs text-gray-700 hover:text-brand">{{ $item->user->name }}</a>
                @if (!$loop->last)
                    -
                @endif
            @endforeach
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <x-link-show :link="$case->route('show')"/>
        </div>
    </td>
</tr>