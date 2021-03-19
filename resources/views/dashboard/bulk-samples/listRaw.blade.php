<tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $bulkSample->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <div class="flex"><a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="text-xs text-gray-600 hover:text-blue-500">
                @if ($bulkSample->room->center->type == 'personal_clinic')
                    @lang('Personal clinic of :user', ['user' => $bulkSample->room->manager->name])
                @else
                    {{ $bulkSample->room->center->detail->title }}
                @endif
            </a></div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <div class="flex"><a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="text-xs text-gray-600 hover:text-blue-500">{{ $bulkSample->room->manager->name }}</a></div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <div class="flex">
                <span class="text-xs text-gray-600">
                    @lang($bulkSample->case_status)
                </span>
        </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <div class="flex"><span class="text-xs text-gray-600 cursor-default">{{ $bulkSample->members }} / {{ $bulkSample->joined }}</span></div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-500 cursor-default">@lang($bulkSample->status)</span>
        </div>
    </td>
    <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}"><i class="fal fa-eye text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
        <div class="inline-block">
            <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Registration link') }}</a>
            <span class="text-xs inline-block border p-1 rounded" data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}">کپی</span>
        </div>
    </td>
</tr>
