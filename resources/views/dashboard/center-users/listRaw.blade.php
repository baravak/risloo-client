<tr data-xhr-fold=".list-raw" data-xhr="center-users-list-{{ $user->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $user->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="tel:+{{ $user->mobile }}" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500 direct">+{{ $user->mobile }}</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">@displayName($user->creator)</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="inline-flex items-center">
            @can('update', [$user, 'position'])
                <select class="text-xs text-gray-700 border border-gray-400 rounded-full py-1 pr-8" name="position" id="position" data-lijax="change" data-action="{{ route('dashboard.center.users.update', ['center'=> $center->id, 'user'=> $user->id]) }}" data-method="PUT" data-xhrBase='row'>
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
                <span class="text-xs text-gray-700">{{ __(ucfirst($user->position)) }}</span>
            @endcan
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
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-2">
            <x-link-show :link="route('dashboard.center.users.show', ['center' => $center->id, 'user'=> $user->id])"/>
        </div>
        @can('update', $user)
        <div class="inline-block">
            <a href="{{ route('dashboard.center.users.edit', ['center' => $center->id, 'user' => $user->id]) }}" alt="ویرایش"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
        @endcan

        <div class="inline-block mr-2">
            @can('accept', [$user, $center])

                <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept" class="inline-block px-3 py-1 text-xs text-white bg-green-600 hover:bg-green-700 rounded-full transition" title="{{ __('Accept') }}">{{ __('Accept') }}</a>
            @endcan
            @can('kick', [$user, $center])
                <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick" class="inline-block px-3 py-1 text-xs text-red-600 hover:text-white border border-red-600 hover:bg-red-600 rounded-full transition" title="{{ __('Kick') }}">{{ __('Kick') }}</a>
            @endcan
        </div>
        @can('create', [\App\Room::class, $center, $user])
        <div class="inline-block">
            <a href="{{ route('dashboard.rooms.create', ['center' => $center->id]) }}" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition" title="{{ __('Create room') }}">{{ __('Create room') }}</a>
        </div>
        @elseif($user->meta && $user->meta->room_id)
        <div class="inline-block">
            <a href="{{ route('dashboard.rooms.show', $user->meta->room_id) }}" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition" title="@lang('Therapy room')">@lang('Therapy room')</a>
        </div>
        @endcan
    </td>
</tr>
