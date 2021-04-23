<tr>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default en">{{ $session->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            <div class="flex">
                <a href="{{ $session->room->route('show') }}" class="text-xs text-gray-600 hover:text-blue-500 underline transition">
                    @lang('Therapy room of :user', ['user' => $session->room->manager->name])
                </a>
            </div>
            <div class="flex mt-1">
                <a href="{{ $session->room->center->route('show') }}" class="text-xs text-gray-500 hover:text-blue-500 underline transition">
                    @if ($session->room->center->type == 'personal_clinic')
                        @lang('Personal clinic')
                    @else
                        {{ $session->room->center->detail->title }}
                    @endif
                </a>
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        @if ($session->case)
            <div class="flex items-center">
                <a href="{{ $session->case->route('show') }}" class="text-xs text-gray-600 hover:text-blue-500 en underline transition">{{ $session->case->id }}</a>
            </div>
        @endif
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @isset ($session->case->clients)
                @foreach ($session->case->clients as $client)
                    <div class="flex">
                        <a href="{{ route('dashboard.center.users.show', ['center' => $session->room->center->id, 'user' => $client->id]) }}" class="text-xs text-gray-600 hover:text-blue-500 underline transition">
                            @displayName($client)
                        </a>
                    </div>
                    @if (!$loop->last) <span class="mx-1 text-gray-300"></span> @endif
                @endforeach
            @endisset
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            <div class="flex"><span class="text-xs text-gray-600 cursor-default">@time($session->started_at, '%A %d %B %y')</span></div>
            <div class="flex"><span class="text-xs text-gray-600 cursor-default">@time($session->started_at, 'ساعت H:i')</span></div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
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
            <a href="{{ $session->route('edit') }}" title="{{ __('Edition') }}">
                <i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i>
            </a>
        </div>
    </td>
</tr>
