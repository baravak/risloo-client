<tr data-xhr-fold=".list-raw" data-xhr="center-users-list-{{ $user->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $user->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->user->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->creator->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="inline-flex items-center">
            <span class="text-xs text-gray-700">{{ __(ucfirst($user->position)) }}</span>
        </div>
        <span class="text-gray-400 ">/</span>
        <div class="inline-flex items-center text-xs text-gray-600">
            @if($user->kicked_at)
                {{__('Kicked')}}
            @elseif(!$user->accepted_at)
                {{__('Awaiting')}}
            @else
                {{__('Accepted')}}
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="text-xs text-gray-600">
            @responsiveTime($user->accepted_at)
        </div>
        <div class="text-xs text-red-600 mt-1">
            @responsiveTime($user->kicked_at)
        </div>
    </td>
</tr>