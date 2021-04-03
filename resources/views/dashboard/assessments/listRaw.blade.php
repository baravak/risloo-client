<tr class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600 block text-right dir-ltr en">{{ $assessment->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">{{ $assessment->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">{{ $assessment->edition }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-500">{{ $assessment->version }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        @can('dashboard.sessions.create')
            <div class="inline-flex">
                <a href="{{ route('dashboard.samples.create', ['scale' => substr($assessment->id, 1)]) }}" class="block px-4 py-1 text-xs text-brand border border-brand hover:bg-brand hover:text-white rounded-full transition focus" title="{{ __('Create sample') }}" aria-label="{{ __('Create sample') }}">{{ __('Create sample') }}</a>
            </div>
        @endcan
    </td>
</tr>