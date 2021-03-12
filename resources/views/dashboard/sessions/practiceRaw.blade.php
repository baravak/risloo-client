<tr data-xhr="practice-{{ $practice->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{$practice->id}}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{$practice->title}}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $practice->content }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            @if ($practice->getRelationValue('attachments'))
                <a href="{{$practice->attachments->get('original')->url}}" target="_blank" class="text-xs text-gray-600 hover:text-blue-600">
                    <i class="far fa-cloud-download"></i>
                    <span>{{ __('Downlaod attachment') }}</span>
                </a>
            @else
                <span class="text-xs text-gray-600 cursor-default">{{__('No attachment')}}</span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            @if ($practice->homework)
                <a href="{{ $practice->homework->url}}" target="_blank" class="text-xs text-gray-600 hover:text-blue-600">
                    <i class="far fa-cloud-download"></i>
                    <span>{{ __('Download homework') }}</span>
                </a>
            @else
                <label for="homework-{{ $practice->id }}" class="text-xs text-gray-600 hover:text-blue-600 cursor-pointer">
                        <i class="far fa-cloud-upload"></i>
                        {{ __('Upload homework') }}
                </label>
                <input data-action="{{ route('dashboard.sessions.practices.homework.store', ['session' => $session->id, $practice->id]) }}" data-method="post" data-lijax="change" type="file" class="hidden" name="attachment" id="homework-{{ $practice->id }}">
            @endif
        </div>
    </td>
</tr>
