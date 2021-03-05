<tr>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $session->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="{{ $session->case->room->route('show') }}" class="text-xs text-gray-700 block">
                @lang('Therapy room of :user', ['user' => $session->case->room->manager->name])
            </a>
            <a href="{{ $session->case->room->center->route('show') }}" class="text-xs text-gray-500 block mt-1">
                @if ($session->case->room->center->type == 'personal_clinic')
                    @lang('Personal clinic')
                @else
                    {{ $session->case->room->center->detail->title }}
                @endif
            </a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="{{ $session->case->route('show') }}" class="text-xs text-gray-700 block">{{ $session->case->id }}</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
                @foreach ($session->case->clients as $client)
                    <a href="{{ route('dashboard.center.users.show', ['center' => $session->case->room->center->id, 'user' => $client->id]) }}" class="text-xs text-gray-700">
                        @displayName($client)
                    </a>
                    @if (!$loop->last)
                        <span class="text-xs text-gray-500">
                        -
                        </span>
                    @endif
                @endforeach
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">@time($session->started_at, '%A %d %B %y ساعت H:i')</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($session->status)) }}</span>
            {{-- <span class="text-xs text-red-500 cursor-default">لغو شده توسط مراجع</span>
            <span class="text-xs text-green-500 cursor-default">در جلسه</span>
            <span class="text-xs text-gray-500 cursor-default">پایان یافته</span> --}}
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <x-link-show :link="$session->route('show')"/>
        </div>
        <div class="inline-block">
            <a href="{{ $session->route('edit') }}" alt="{{ __('Edition') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
    </td>
</tr>
