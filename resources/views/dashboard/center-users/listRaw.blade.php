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
            <a href="tel:+{{ $user->user->mobile }}" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500 direct">+{{ $user->user->mobile }}</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->creator->name }}</span>
        </div>
    </td>
    <td>
        <div>
            @can('update', [$user, 'position'])
                <select name="position" id="position" data-lijax="change" data-action="{{ route('dashboard.center.users.update', ['center'=> $center->id, 'user'=> $user->id]) }}" data-method="PUT" data-xhrBase='row'>
                    @php
                        $positions = ['manager', 'operator', 'client', 'psychologist'];
                        if(!auth()->isAdmin() && $center->manager->id != auth()->id())
                        {
                            array_shift($positions);
                            if($center->acceptation->position != 'manager')
                            {
                                array_shift($positions);
                            }
                        }
                    @endphp
                    @foreach ($positions as $item)
                        <option value="{{ $item }}" {{ $user->position == $item ? 'selected' : '' }}>{{ __(ucfirst($item)) }}</option>
                    @endforeach
                </select>
            @else
                {{ __(ucfirst($user->position)) }}
            @endcan
        </div>
        <div class="text-xs">
            @if($user->kicked_at)
                {{__('Kicked')}}
            @elseif(!$user->accepted_at)
                {{__('Awaiting')}}
            @else
                {{__('Accepted')}}
            @endif
        </div>
    </td>
</tr>