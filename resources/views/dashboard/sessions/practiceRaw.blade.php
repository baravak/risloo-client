<tr data-xhr="practice-{{ $practice->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{$practice->id}}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{$practice->title}}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $practice->description }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">
                @if ($practice->getRelationValue('attachments'))
                    <a href="{{$practice->attachments->get('original')->url}}" target="_blank">{{__('Practice')}}</a>
                @else
                    {{__('No attachment')}}
                @endif
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div claas="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">
                @if ($practice->homework)
                <a href="{{ $practice->homework->url}}" target="_blank">{{ __('Homework') }}</a>
                @else
                    <label class="btn btn-secondary btn-sm fs-10 cursor-pointer" for="homework-{{ $practice->id }}">
                            <i class="far fa-cloud-upload"></i>
                            {{ __('Upload homework') }}
                    </label>
                    <input data-action="{{ route('dashboard.sessions.practices.homework.store', ['session' => $session->id, $practice->id]) }}" data-method="post" data-lijax="change" type="file" class="hidden" name="attachment" id="homework-{{ $practice->id }}">
                @endif
            </span>
        </div>
    </td>
</tr>
