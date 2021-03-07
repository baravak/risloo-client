<tr  data-xhr="sample-list-{{ $sample->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="block text-xs font-medium text-gray-700 cursor-default">{{ $sample->scale->title }}</span>
            <span class="block text-gray-400 font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            @if ($sample->client)
            <span href="#" class="text-xs text-gray-700 cursor-default">@displayName($sample->client)</span>
            @else
            <span href="#" class="text-xs text-gray-700 cursor-default">{{ $sample->code }}</span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <a href="{{ $sample->room->route('show') }}" class="text-xs text-gray-700 hover:text-blue-500">{{ __('Therapy room of :user', ['user' => $sample->room->manager->name]) }}</a>
            @if ($sample->case)
                    <a class="block text-xs text-gray-500 hover:text-blue-500" href="{{ route('dashboard.cases.show', $sample->case->id) }}">@lang('Case') {{ $sample->case->id }}</a>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($sample->status)) }}</span>
        </div>
    </td>
    <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
            @include('dashboard.samples.do')
    </td>
</tr>
