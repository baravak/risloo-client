<tr data-xhr="practice-list-{{$practice->id}}">
    <td>
        @id($practice)
    </td>
    <td>
        {{$practice->title}}
    </td>
    <td>
        {{$practice->content}}
    </td>
    <td>
        @if ($practice->getRelationValue('attachments'))
            <a href="{{$practice->attachments->get('original')->url}}" target="_blank">{{__('practice')}}</a>
        @else
            {{__('No attachment')}}
        @endif
    </td>
    <td>
        {{$practice->notic}}
    </td>
    <td>
        @if ($practice->homework)
        <a href="{{ $practice->homework->url}}" target="_blank">{{ __('Homework') }}</a>
        @else
            <label class="btn btn-secondary btn-sm fs-10" for="homework-{{ $practice->id }}">
                    <i class="far fa-cloud-upload"></i>
                    {{ __('Upload homework') }}
            </label>
            <input data-action="{{ route('dashboard.sessions.practices.homework.store', ['session' => $practice->parentModel->id, $practice->id]) }}" data-method="post" data-lijax="change" type="file" class="d-none" name="attachment" id="homework-{{ $practice->id }}">
        @endif
    </td>
    <td>
    </td>
</tr>
