<tr data-xhr-fold=".list-raw" data-xhr="center-users-list-{{ $user->id }}">

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $user->id }}</span>
        </div>
    </td>

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->name }}</span>
        </div>
    </td>

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <a href="tel:+{{ $user->mobile }}" class="inline-block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500 direct">+{{ $user->mobile }}</a>
        </div>
    </td>

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
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

    <td class="px-3 py-2 whitespace-nowrap">
        <div class="inline-block mr-2">
            <x-link-show :link="route('dashboard.center.users.show', ['center' => $room->center->id, 'user' => $user->id])"/>
        </div>
    </td>
</tr>
