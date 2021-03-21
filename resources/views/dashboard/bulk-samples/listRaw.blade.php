<tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $bulkSample->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $bulkSample->title }}</span>
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
            <div class="flex"><span class="text-xs text-gray-600 cursor-default">{{ $bulkSample->members_count }} / {{ $bulkSample->joined }}</span></div>
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
        <div class="inline-flex border border-brand rounded-full text-xs text-brand">
            <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="pl-3 pr-2 py-1 hover:bg-brand hover:text-white transition rounded-l-full">{{ __('Registration link') }}</a>
            <div data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" class="pr-3 pl-2 py-1 cursor-pointer border-l border-brand border-opacity-30 hover:bg-brand hover:text-white transition rounded-r-full">
                <i class="fal fa-copy relative top-0.5"></i>
            </div>
        </div>
    </td>
</tr>
